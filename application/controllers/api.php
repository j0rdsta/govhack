<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class API extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Suburb');
		$this->load->model('Crime');
		$this->load->model('Review');
	}


	function Suburbs() {
		$suburbs = $this->Suburb->GetAll();
		foreach($suburbs as $key => $value) {
			$suburb_id = $suburbs[$key]['suburb_id'];
			$suburbs[$key]['population'] = $this->Suburb->GetPopulation($suburb_id);
			$suburbs[$key]['crime'] = $this->Suburb->GetCrime($suburb_id);
		}
		$this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($suburbs));
	}

	function Suburb($suburb_id = null) {
		if (!$suburb_id || !$suburb = $this->Suburb->Get($suburb_id))
			show_error('Invalid suburb');//TODO: Nice error page

		$suburb['population'] = $this->Suburb->GetPopulation($suburb_id);
		$suburb['crime'] = $this->Suburb->GetCrime($suburb_id);

		$this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($suburb));
	}
}
