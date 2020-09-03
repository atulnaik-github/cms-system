<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

	public function __construct() {
		parent::__construct();        
	}

	public function index() {	
		if (!empty($this->session->sessiondata['username'])) {
			$para = array('status' => 'logout');
			$data = array('email' => $this->session->sessiondata['username'], 'status' => 'login');
			$result = $this->op->modify($this->TBLLOGINLOGS,$data,$para);
			$msg = array('successMSG' => 'You have been successfully logged out...');
			$this->session->set_userdata($msg);
			$this->session->sess_destroy();
		} else {
			$this->session->sess_destroy();
		}
		$this->load->view('login');
	}
}
