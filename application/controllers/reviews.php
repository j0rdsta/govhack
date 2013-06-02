<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reviews extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->Security->EnsureLogin();
		$this->load->model('Suburb');
		$this->load->model('Review');
		$this->load->helper('url');
	}

	private function valid_email($field) {
	    return preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $field);
	}

	function Create() {
		$review = @$_POST['review'];
		if(empty($review) || empty($review['name']) || empty($review['review']) || empty($review['rating']) || empty($review['suburb_id'])  || empty($review['email']))
			show_error('Invalid Review');

		if (!$this->valid_email($review['email']))
			show_error('Invalid Email');

		$review['rating'] = (int) $review['rating'];
		$suburb_id = @$review['suburb_id'];

		if (!$suburb = $this->Suburb->Get($suburb_id))
			show_error('Invalid Suburb');

		// Valid & posted
		$this->Review->Create($review);
		redirect('/suburbs/view/' . $suburb_id, 'location');
	}


	function Edit($suburb_id = null) {
		if (!$suburb_id) {
			//$suburb = $this->Suburb->GetPrototype();
		} else {
			if (!$suburb = $this->Suburb->Get($suburb_id))
				show_error('Invalid suburbs');
		}

		// Valid & posted
		if (false) {
			$this->Review->Save($suburb_id, array('values'));
			redirect('/', 'location');
		} else {
			// Edit

			$title = $suburb_id? 'Edit Suburb' : 'Create Suburb';
		}
	}	
}
