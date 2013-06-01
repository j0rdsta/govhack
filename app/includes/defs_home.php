<?php
// Home Functions

function list_locations($limit = 5){
	// Placeholder - REPLACE ME
	for ($i = 0; $i < $limit; $i++) {
		$results[$i]["image"] = "images/placeholder_pin.png";
		$results[$i]["name"] = "Varsity Lakes";
		// Logic needed here - Low = 1, Med = 2, High = 3
		$results[$i]["crimerating"] = "Low";
		$results[$i]["growthrate"] = "High";
	}

	return $results;
}

?>