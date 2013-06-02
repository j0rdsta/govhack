<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->Security->EnsureLogin();
		$this->load->helper('url');
		$this->load->library('smartylib');
	}

	function View($page_name = null) {
		if($page_name == 'documentation') {
			$this->smartylib->display('pages/documentation.tpl');
		} else {
			redirect('/', 'location');
		}
	}
}
