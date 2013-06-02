<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Suburbs extends CI_Controller {
	function __construct() {
		parent::__construct();
		//$this->Security->EnsureLogin();
		$this->load->model('Suburb');
		$this->load->model('Crime');
		$this->load->model('Review');
		$this->load->helper('url');
		$this->load->library('smartylib');
	}

	function index() {
		$this->smartylib->assign('results', $this->Suburb->GetAll());
		$this->smartylib->assign('average_crime', $this->Crime->GetAverageLatest());
		$this->smartylib->assign('search_params', $this->getSearchParams());
		$this->smartylib->display('suburbs/list.tpl');
	}

	private function getSearchParams() {
		$search_params = array(
			'crime' => @$_GET['crime'],
			'orderby' => @$_GET['orderby'],
			'sort' => @$_GET['sort']
		);
		return $search_params;
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
			show_error('Invalid suburb');//TODO: Nice error page

		$reviews = array();//array('1', '2');

		$this->smartylib->assign('suburb', $suburb);
		$this->smartylib->assign('average_crime', $this->Crime->GetAverageLatest());
		$this->smartylib->assign('reviews', $this->Review->GetAll(array('suburb_id' => $suburb_id)));
		$this->smartylib->display('suburbs/view.tpl');
	}

	function Search() {
		$search_params = $this->getSearchParams();
		$query = isset($_GET['query'])? $_GET['query'] : '';
		$average_crime = $this->Crime->GetAverageLatest();

		$search_where = array();
		if(!empty($search_params['crime'])) {
			if($search_params['crime'] == 'high') {
				$search_where['crime_latest >'] = $average_crime;
			} else {
				$search_where['crime_latest <='] = $average_crime;
			}
		}

		$order_by;
		switch($search_params['orderby']) {
			case 'crime':
				$order_by = 'crime_latest';
			break;
			case 'population':
				$order_by = 'population_latest';
			break;
			case 'alpha':
			default:
				$order_by = 'suburb_name';
			break;
		}
		if(!empty($search_params['sort']) && $search_params['sort'] == 'desc') {
			$order_by .= " DESC";
		} else {
			$order_by .= " ASC";
		}
		
		$this->smartylib->assign('results', $this->Suburb->Search($query, $search_where, $order_by));
		$this->smartylib->assign('query', $query);
		$this->smartylib->assign('average_crime', $average_crime);
		$this->smartylib->assign('search_params', $search_params);
		$this->smartylib->display('suburbs/search.tpl');
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
