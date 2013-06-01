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
		error_log(print_r($this->Suburb->GetAll(), true));
		$this->smartylib->assign('results', $this->Suburb->GetAll());
		$this->smartylib->display('index.tpl');
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
			die('Invalid suburb');

		//View
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
}
