<?php
class Crime extends CI_Model {
	function GetAverage() {
		$query = $this->db->query('SELECT year, AVG(total_count) AS avg_count FROM (SELECT year, SUM(count) AS total_count, suburb_name FROM data_crime GROUP BY suburb_name, year) AS grouped GROUP BY year ORDER BY year ASC');
		return $query->result_array();
	}

	function GetAverageLatest() {
		$query = $this->db->query('(SELECT AVG(total_count) AS average_latest, year FROM (SELECT SUM(count) AS total_count, year FROM data_crime GROUP BY suburb_name, year) AS totals GROUP BY year ORDER BY year DESC LIMIT 1)');
		$result = $query->row_array();
		return isset($result['average_latest'])? $result['average_latest'] : null;
	}
}
?>