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
			$region = $row[1];
			for($i = 2; $i < count($row); $i++) {
				$year = $columns[$i];
				$population = $row[$i];

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

import_population_csv('data/population_data_clean.csv');
?>
</pre>