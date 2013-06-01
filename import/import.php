<pre>
<?php
function dbconnect(){
	include('dbconfig.php');
	$DBLink = mysql_connect("localhost", $DBUser, $DBPass) or die("Could not connect: " . mysql_error());
	mysql_select_db($DBName, $DBLink) or die("Could not select database: " . mysql_error());
	return $DBLink;
}

function dbclose($DBLink){
	if($DBLink){
		mysql_close($DBLink);
		unset($DBLink);
	}
}

function strip_array_slashes($array){
	if(is_array($array)){
		foreach($array as $k => $v){
			$array[$k] = stripslashes($v);
		}
	} else {
		$array = stripslashes($array); 
	}	
	return $array;
}

function import_population_csv($filename){
	$DBLink = dbconnect();
	ini_set('auto_detect_line_endings',TRUE);

	$handle = fopen($filename, "r");
	$lnum = 0;

	$columns;

	while($row = fgetcsv($handle, 0, ",")){ // Start a loop
		if($lnum == 0) {
			$columns = $row;
			$lnum++;
			continue;// Skip first row because they are just the column headers
		}

		// Sometimes a range of suburbs will be defined - e.g. suburb1-suburb2
		// In this case we simply use the same data for both suburbs - as we don't know the suburbs between
		$suburbs = explode('-', $row[0]);

		foreach ($suburbs as $suburb_name) {
			$suburb_name = mysql_real_escape_string($suburb_name);
			$region = mysql_real_escape_string($row[1]);

			for($i = 2; $i < count($row); $i++) {
				$year = (int) $columns[$i];
				$population = (int) $row[$i];

				$q = "
					INSERT INTO
					data_population
					SET
					`suburb_name` = '$suburb_name',
					`region` = '$region',
					`year` = '$year',
					`population` = '$population'
		         ";
		        $r = mysql_query($q) or die("error in query: ".mysql_error()."<br/>$q");

				//$vals = array('suburb_name' => $suburb_name, 'population' => $population, 'year' => $year, 'region' => $region);
				//echo json_encode($vals) . "\n";
			}
		}

		$lnum++;
	}
	fclose($handle); // Close file
	dbclose($DBLink);
}

function import_crime_csv($filename){
	$DBLink = dbconnect();
	ini_set('auto_detect_line_endings',TRUE);

	$handle = fopen($filename, "r");
	$lnum = 0;

	$columns;

	while($row = fgetcsv($handle, 0, ",")){ // Start a loop
		if($lnum == 0) {
			$columns = $row;
			$lnum++;
			continue;// Skip first row because they are just the column headers
		}

		$suburb_name = mysql_real_escape_string($row[0]);
		$crime = mysql_real_escape_string($row[1]);
		for($i = 2; $i < count($row); $i++) {
			$year = (int) $columns[$i];
			$count = (int) $row[$i];

			$q = "
				INSERT INTO
				data_crime
				SET
				`suburb_name` = '$suburb_name',
				`crime` = '$crime',
				`year` = '$year',
				`count` = '$count'
	         ";
	        $r = mysql_query($q) or die("error in query: ".mysql_error()."<br/>$q");
		}

		$lnum++;
	}
	fclose($handle); // Close file
	dbclose($DBLink);
}

// Used for convenience to create suburbs from data_crime & data_population
function generate_suburbs() {
	$DBLink = dbconnect();

	$cq = "SELECT DISTINCT `suburb_name` FROM `data_crime` WHERE `suburb_name` NOT IN (SELECT `suburb_name` FROM `suburbs`)";
    $cr = mysql_query($cq) or die("error in query: ".mysql_error()."<br/>$q");
    while($row = mysql_fetch_assoc($cr)) {
    	$suburb_name = mysql_real_escape_string($row['suburb_name']);
    	$iq = "INSERT INTO suburbs SET `suburb_name` = '$suburb_name'";
	    $ir = mysql_query($iq) or die("error in query: ".mysql_error()."<br/>$q");
    }

	$pq = "SELECT DISTINCT `suburb_name` FROM `data_population` WHERE `suburb_name` NOT IN (SELECT `suburb_name` FROM `suburbs`)";
    $pr = mysql_query($pq) or die("error in query: ".mysql_error()."<br/>$q");
    while($row = mysql_fetch_assoc($pr)) {
    	$suburb_name = mysql_real_escape_string($row['suburb_name']);
    	$iq = "INSERT INTO suburbs SET `suburb_name` = '$suburb_name'";
	    $ir = mysql_query($iq) or die("error in query: ".mysql_error()."<br/>$q");
    }

	dbclose($DBLink);
}


function update_suburbs($update_locations = false) {
	$DBLink = dbconnect();

	// Calculate mean crime and standard deviation of total crime
	$cq = "SELECT AVG(total_crime) AS crime_mean, STDDEV(total_crime) AS crime_stddev FROM (SELECT SUM(count) AS total_crime, suburb_name FROM data_crime GROUP BY suburb_name ORDER BY suburb_name ASC) AS suburb_crimes";
    $cr = mysql_query($cq) or die("error in query: ".mysql_error()."<br/>$q");

    if(mysql_num_rows($cr) != 1) {
        dbclose($DBLink);
        return null;
    }

    $crime_meta = mysql_fetch_assoc($cr);
    $crime_mean = (float) $crime_meta['crime_mean'];
    $crime_stddev = (float) $crime_meta['crime_stddev'];

	// Calculate mean population and standard deviation of population
	$pq = "SELECT AVG(total_population) AS population_mean, STDDEV(total_population) AS population_stddev FROM (SELECT SUM(population) AS total_population, suburb_name FROM data_population GROUP BY suburb_name ORDER BY suburb_name ASC) AS suburb_crimes";
    $pr = mysql_query($pq) or die("error in query: ".mysql_error()."<br/>$q");

    if(mysql_num_rows($pr) != 1) {
        dbclose($DBLink);
        return null;
    }
    
    $population_meta = mysql_fetch_assoc($pr);
    $population_mean = $population_meta['population_mean'];
    $population_stddev = $population_meta['population_stddev'];

    $suburbs = array();

	$sq = "SELECT * FROM suburbs";
    $sr = mysql_query($sq) or die("error in query: ".mysql_error()."<br/>$q");
    while($suburb = mysql_fetch_assoc($sr)) {
    	$suburb = strip_array_slashes($suburb);
    	$suburb_name = mysql_real_escape_string($suburb['suburb_name']);

    	// Find latitude and longitude of suburb using Google Geocode API (only if enabled in params)
    	if($update_locations) {
	    	$location = find_location($suburb['suburb_name']);
	    	if($location) {
				$suburb['latitude'] = $location['latitude'];
				$suburb['longitude'] = $location['longitude'];
	    	}
    	}

    	// Calculate crime statistics
    	$q = "SELECT SUM(count) AS total_crime, suburb_name FROM data_crime WHERE suburb_name = '$suburb_name'";
    	$r = mysql_query($q) or die("error in query: ".mysql_error()."<br/>$q");
    	$crime = mysql_fetch_assoc($r);
    	$total_crime = (int) $crime['total_crime'];
    	if($total_crime) {
	    	$suburb['crime_accumulative'] = $total_crime;
	    	$suburb['crime_percentile'] = ($total_crime - $crime_mean) / (float) $crime_stddev;
    	} else {
    		$suburb['crime_accumulative'] = null;
    		$suburb['crime_percentile'] = null;
    	}

    	// Calculate population statistics
    	$q = "SELECT SUM(population) AS total_population, suburb_name FROM data_population WHERE suburb_name = '$suburb_name'";
    	$r = mysql_query($q) or die("error in query: ".mysql_error()."<br/>$q");
    	$population = mysql_fetch_assoc($r);
    	$total_population = (int) $population['total_population'];
    	if($total_population) {
	    	$suburb['population_accumulative'] = $total_population;
	    	$suburb['population_percentile'] = ($total_population - $population_mean) / (float) $population_stddev;
    	} else {
    		$suburb['population_accumulative'] = null;
    		$suburb['population_percentile'] = null;
    	}

    	$suburbs[] = $suburb;
    }

	function crime_compare($a, $b) {
		return $a['crime_accumulative'] < $b['crime_accumulative'];
	}
	usort($suburbs, "crime_compare");

    for($i = 0; $i < count($suburbs); $i++) {
    	if(!$suburbs[$i]['crime_accumulative']) {
    		$suburbs[$i]['crime_ranking'] = null;
    		continue;
    	}
    	$suburbs[$i]['crime_ranking'] = $i + 1;
    }

    function population_compare($a, $b) {
		return $a['population_accumulative'] < $b['population_accumulative'];
	}
	usort($suburbs, "population_compare");

    for($i = 0; $i < count($suburbs); $i++) {
    	if(!$suburbs[$i]['population_accumulative']) {
    		$suburbs[$i]['population_ranking'] = null;
    		continue;
    	}
    	$suburbs[$i]['population_ranking'] = $i + 1;
    }

    // Update suburbs
    foreach($suburbs as $suburb) {
		$uq = "
			UPDATE `suburbs`
			SET
			`suburb_name` = '{$suburb['suburb_name']}',
			`latitude` = '{$suburb['latitude']}',
			`longitude` = '{$suburb['longitude']}',
			`crime_accumulative` = '{$suburb['crime_accumulative']}',
			`crime_percentile` = '{$suburb['crime_percentile']}',
			`crime_ranking` = '{$suburb['crime_ranking']}',
			`crime_growth` = '{$suburb['crime_growth']}',
			`population_accumulative` = '{$suburb['population_accumulative']}',
			`population_percentile` = '{$suburb['population_percentile']}',
			`population_ranking` = '{$suburb['population_ranking']}'
			WHERE `suburb_id` = '{$suburb['suburb_id']}'
		";
		$ur = mysql_query($uq) or die("error in query: ".mysql_error()."<br/>$q");
    }

	dbclose($DBLink);
}

function find_location($address) {
	set_time_limit(0);
	$urlAddress = urlencode($address);
	$url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&region=au&address=".$urlAddress;

	$request = curl_init();
	curl_setopt($request,CURLOPT_URL,$url);
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($request);
	curl_close($request);
		
	if($response != false) {
		$responseObj = json_decode($response);
		if($responseObj != null && $responseObj != false) {
			switch($responseObj->status) {
				case "OK":
					$lat = $responseObj->results[0]->geometry->location->lat;
					$lng = $responseObj->results[0]->geometry->location->lng;
					if(is_numeric($lat) && is_numeric($lng)) {
						return array('latitude' => $lat, 'longitude' => $lng);
					} else {
						error_log("LAT & LNG NOT NUMERIC: " . $address);
					}
				break;
				case "OVER_QUERY_LIMIT":
						error_log("24HOUR LIMIT REACHED: " . $address);
						echo "24HOUR LIMIT REACHED: " . $address;
						die();
				break;
				default:					
					error_log("STATUS ERROR: " . $address);
				break;
			}
		} else {
			error_log("Faulty JSON ID: " . $address);
		}
	} else {
		error_log("Request failed ID: " . $address);
	}
	return null;
}

//import_population_csv('data/population_data_clean.csv');
//import_crime_csv('data/crime/broadbeach.csv');
//import_crime_csv('data/crime/coolangatta.csv');
//import_crime_csv('data/crime/coomera.csv');
//import_crime_csv('data/crime/mudgeeraba.csv');
//import_crime_csv('data/crime/nerang.csv');
//import_crime_csv('data/crime/palm_beach.csv');
//import_crime_csv('data/crime/robina.csv');
//import_crime_csv('data/crime/runaway_bay.csv');
//import_crime_csv('data/crime/southport.csv');
//import_crime_csv('data/crime/surfers_paradise.csv');

generate_suburbs();
update_suburbs();

?>
</pre>