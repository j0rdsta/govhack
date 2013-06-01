<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->library('smartylib');

		$this->smartylib->assign('results', array('234'));
		$this->smartylib->display('index.tpl');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */