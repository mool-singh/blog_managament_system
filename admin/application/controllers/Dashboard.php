<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

	public function __construct(){
		parent::__construct();
		auth_check(); // check login auth
		check_premissions($this->router->fetch_class(), $this->router->fetch_method());
		
		$this->load->model('dashboard_model', 'dashboard_model');
	}

	//--------------------------------------------------------------------------
	public function index(){

		$data['subadmin_users'] = $this->dashboard_model->get_blogs();

		$data['title'] = 'Dashboard';

		$this->load->view('includes/_header');
    	$this->load->view('dashboard/index', $data);
    	$this->load->view('includes/_footer');
	}

	 
	
}

?>	