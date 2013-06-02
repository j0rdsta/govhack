<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Crimes extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->Security->EnsureLogin();
		$this->load->model('Crime');
	}

	function AverageJSON($suburb_id = null) {
		$crime = $this->Crime->GetAverage();
		$this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($crime));
	}	
}