<?php
class Review extends CI_Model {
	function Get($review_id) {
		$this->db->from('reviews');
		$this->db->where('review_id', $review_id);
		return $this->db->get()->row_array();
	}

	/**
	* Retrieve multiple review records
	* @param array $where Optional where condition
	* @param string $orderby Optional order_by condition
	* @param int $limit Optional number of records to return
	* @param int $offset Optional offset of records to return
	*/
	function GetAll($where = null, $orderby = null, $limit = 100, $offset = 0) {
		$this->db->from('reviews');
		if ($where)
			$this->db->where($where);
		if ($orderby)
			$this->db->order_by($orderby);
		$this->db->limit($limit,$offset);
		return $this->db->get()->result_array();
	}

	/**
	* Creates a new review
	* @param array $data Data that should be used to create the review
	* @return int Either the new review ID or false
	*/
	function Create($data) {
		$fields = array();
		foreach (array('suburb_id', 'name', 'email', 'review', 'rating') as $field)
			if(isset($data[$field]))
				$fields[$field] = $data[$field];

		if ($fields) {
			$this->db->insert('reviews', $fields);
			return $this->db->insert_id();
		} else {
			return FALSE;
		}
	}
}
?>