<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Suburbs extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->Security->EnsureLogin();
		$this->load->model('Suburb');
		$this->load->helper('url');
		$this->load->library('smartylib');
	}

	function index() {
		$this->smartylib->assign('results', $this->Suburb->GetAll());
		$this->smartylib->display('suburbs/list.tpl');
	}

	function Create() {
		$this->Edit(null);
	}

	/**
	* View a suburb
	* @param int $suburb_id The ID of the suburb to view
	*/
	function View($suburb_id = null) {
		if (!$suburb_id)
			redirect('/');
		if (!$suburb = $this->Suburb->Get($suburb_id))
			die('Invalid suburb');//TODO: Nice error page

		$this->smartylib->assign('suburb', $suburb);
		$this->smartylib->display('suburbs/view.tpl');
	}

	function Search() {
		$query = isset($_GET['query'])? $_GET['query'] : '';

		$this->smartylib->assign('results', $this->Suburb->Search($query));
		$this->smartylib->assign('query', $query);
		$this->smartylib->display('suburbs/search.tpl');
	}

	function Edit($suburb_id = null) {
		if (!$suburb_id) {
			//$suburb = $this->Suburb->GetPrototype();
		} else {
			if (!$suburb = $this->Suburb->Get($suburb_id))
				die('Invalid suburbs');
		}

		// Valid & posted
		if (false) {
			$this->Suburb->Save($suburb_id, array('values'));
			redirect('/');
		} else {
			// Edit

			$title = $suburb_id? 'Edit Suburb' : 'Create Suburb';
		}
	}

	function PopulationJSON($suburb_id = null) {
		$population = $this->Suburb->GetPopulation($suburb_id);

		$this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($population));
	}

	function CrimeJSON($suburb_id = null) {
		$crime = $this->Suburb->GetCrime($suburb_id);

		$this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode($crime));
	}	
}
