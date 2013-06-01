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

function create_suburbs() {
	
	
	// Get all crime data
		// If suburb does not exist create it
	
	// Get all population data
		// If suburb does not exist create it
		// Calculate mean and stdddev
}


function update_suburbs() {
	// Calculate crime mean and stdddev
	// Calculate population mean and stdddev

	// Go through suburbs
	// Find lat and long

	// Update stats
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

?>