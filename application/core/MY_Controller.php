<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $TBLCATEGORY; 
	public $TBLUSERS; 
	public $TBLLOGINLOGS; 
	public $TBLPOST; 
	public $TBLCOUNTRY; 
	public $TBLSTATE; 
	public $TBLCITY; 


	public function __construct(){
		parent::__construct();
		$this->form_validation->set_error_delimiters('<small style="color:red"><i class="fa fa-exclamation-circle mr-1"></i>' , '</small>');
		$this->load->model('Dboperation','op'); //loading the modal

		$this->TBLCATEGORY = 'tbl_category';
		$this->TBLUSERS = 'tbl_users';
		$this->TBLLOGINLOGS = 'tbl_login_logs';
		$this->TBLPOST = 'tbl_posts';
		$this->TBLCOUNTRY = 'tbl_country';
		$this->TBLSTATE = 'tbl_state';
		$this->TBLCITY = 'tbl_city';
	}

	// this will get the logged in user details
	public function getAuthUser()
	{
		if (!isset($this->session->sessiondata['userid'])) {
			redirect('login','refresh',301);
		} else {
			$para = array('id' => $this->session->sessiondata['userid']);
			return $user = $this->op->userLogin($this->TBLUSERS,$para);
		}
	}	


	public function adminBackend($common,$data = '', $return = FALSE)
	{	
		if (!empty($this->session->userdata('adminEmail'))) {
			if ($return) {
				$this->load->view('adminarea/includes/head-files.php');
				$this->load->view('adminarea/includes/navbar.php');
				$this->load->view('adminarea/includes/sidebar.php');
				$this->load->view($common,$data);
				$this->load->view('adminarea/includes/footer.php');
				$this->load->view('adminarea/includes/js-files.php');
			} else {
				$this->load->view('adminarea/includes/head-files.php');
				$this->load->view('adminarea/includes/navbar.php');
				$this->load->view('adminarea/includes/sidebar.php');
				$this->load->view($common);
				$this->load->view('adminarea/includes/footer.php');
				$this->load->view('adminarea/includes/js-files.php');
			}
		} else {
			redirect(site_url('login'),'location', 301);
		}
	}

	public function userBackend($common,$data = '', $return = FALSE)
	{	
		if (!empty($this->session->userdata('userEmail'))){
			if ($return) {
				$this->load->view('userarea/includes/head-files.php');
				$this->load->view('userarea/includes/sidebar.php');
				$this->load->view('userarea/includes/navbar.php');
				$this->load->view($common,$data);
				$this->load->view('userarea/includes/footer.php');
				$this->load->view('userarea/includes/js-files.php');
			} else {
				$this->load->view('userarea/includes/head-files.php');
				$this->load->view('userarea/includes/sidebar.php');
				$this->load->view('userarea/includes/navbar.php');
				$this->load->view($common);
				$this->load->view('userarea/includes/footer.php');
				$this->load->view('userarea/includes/js-files.php');
			}
		} else {

			redirect(site_url('login'),'location', 301);
		}
	}
}
