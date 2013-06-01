<?php
class Suburb extends CI_Model {
	function Get($suburb_id) {
		$this->db->from('suburbs');
		$this->db->where('suburb_id', $suburb_id);
		return $this->db->get()->row_array();
	}

	/**
	* Retrieve multiple suburb records
	* @param array $where Optional where condition
	* @param string $orderby Optional order_by condition
	* @param int $limit Optional number of records to return
	* @param int $offset Optional offset of records to return
	*/
	function GetAll($where = null, $orderby = null, $limit = 100, $offset = 0) {
		$this->db->from('suburbs');
		if ($where)
			$this->db->where($where);
		if ($orderby)
			$this->db->order_by($orderby);
		$this->db->limit($limit,$offset);
		return $this->db->get()->result_array();
	}

	function Search($query = null, $orderby = null, $limit = 100, $offset = 0) {
		$this->db->from('suburbs');
		if (!empty($query))
			$this->db->like('suburb_name', $query);
		if ($orderby)
			$this->db->order_by($orderby);
		$this->db->limit($limit,$offset);
		return $this->db->get()->result_array();
	}

	function GetPopulation($suburb_id) {
		$this->db->select('year, population');
		$this->db->from('data_population');
		$this->db->join('suburbs', 'data_population.suburb_name = suburbs.suburb_name', 'left');
		$this->db->where(array('suburb_id' => $suburb_id));
		$this->db->order_by('year', 'ASC');
		return $this->db->get()->result_array();
	}
	
	function Count($where = null) {
		$this->db->select('COUNT(*) AS count');
		$this->db->from('suburbs');
		if ($where)
			$this->db->where($where);
		$result = $this->db->get()->row_array();
		return $result['count'];
	}

	/**
	* Creates a new suburb
	* @param array $data Data that should be used to create the suburb
	* @return int Either the new suburb ID or false
	*/
	function Create($data) {
		$fields = array();
		foreach (array('suburb_name') as $field)
			if (isset($data[$field]))
				$fields[$field] = $data[$field];

		if ($fields) {
			$this->db->insert('suburbs', $fields);
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}

	function Save($suburb_id, $data) {
		$fields = array();
		foreach (array('suburb_name') as $field)
			if (isset($data[$field]))
				$fields[$field] = $data[$field];

		if ($fields) {
			$this->db->where('suburb_id', $suburb_id);
			$this->db->update('suburbs', $fields);
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>