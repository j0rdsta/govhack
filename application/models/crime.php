<?php
class Crime extends CI_Model {
	function GetAverage() {
		$query = $this->db->query('SELECT year, AVG(total_count) AS avg_count FROM (SELECT year, SUM(count) AS total_count, suburb_name FROM data_crime GROUP BY suburb_name, year) AS grouped GROUP BY year ORDER BY year ASC');
		return $query->result_array();
	}
}
?>