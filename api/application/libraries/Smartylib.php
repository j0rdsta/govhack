<?php
/**
 * See http://www.smarty.net/docs/en/installing.smarty.extended.tpl.
 */
require './application/third_party/Smarty-3.0.8/libs/Smarty.class.php';
class Smartylib extends Smarty {
	public function __construct() {
		parent::__construct();
		
		$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		$this->setCompileDir(FCPATH . APPPATH . 'cache' . DS);
		$this->setCacheDir(FCPATH . APPPATH . 'cache' . DS);
		$this->setTemplateDir(FCPATH . APPPATH . 'views' . DS);
	}
}

/* End of file Smartylib.php */
/* Location: ./application/libraries/Smartylib.php */
