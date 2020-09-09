<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();        
	}

	public function index()
	{

		if ($this->form_validation->run('login_validation') == false) {
			$this->load->view('login');
		} else {
			if ($this->input->post('submit')) {
				$formData = $this->input->post();
				$userData = $this->op->getTable($this->TBLUSERS);
				foreach ($userData as $user) {
					$enc_pass = $user->encrypted_password;
				}
				$decryPass = md5($formData['password']);
				// $decryPass = password_verify($formData['password'], $enc_pass);
				$data = array(
					'username' => $formData['username'],
					'encrypted_password' => $decryPass,
					'user_status' => '1'
				);
				$loginData = $this->op->userLogin($this->TBLUSERS,$data);
				if (!$loginData > 0) {
					$user_ip = $this->getUserIP(); //getting ip address
					$data = array('email' => $formData['username'],'password' => $decryPass,'ip_address' => $user_ip,'status' => 'failed');
					$addLogs = $this->op->add($this->TBLLOGINLOGS,$data); // adding login details
					$this->session->set_userdata('dangerMSG','Username and Password is invalid...');
					$this->load->view('login');
				} else {
					$fullName = $loginData->first_name.' '.$loginData->last_name;
					$sessionData['sessiondata'] = array(
						'fullname' => $fullName,
						'first_name' => $loginData->first_name,
						'last_name' => $loginData->last_name,
						'email' => $loginData->email,
						'mobile' => $loginData->mobile_number,
						'username' => $loginData->username,
						'userid' => $loginData->id,
						'user_img' => $loginData->user_img,
						'user_role' => $loginData->user_role
					);

					$user_ip = $this->getUserIP(); //getting ip address
					$data = array('email' => $formData['username'],'password' => $decryPass,'ip_address' => $user_ip,'status' => 'login');
					$addLogs = $this->op->add($this->TBLLOGINLOGS,$data); //adding login details
					if ($loginData->user_role == '1') {
						$this->session->set_userdata($sessionData);
						redirect('admin','refresh',301);
					} else if ($loginData->user_role == '0') {
						$this->session->set_userdata($sessionData);
						redirect('user','refresh',301);
					}
				}
			} else {
				$this->load->view('login');
			}
		}
	}

	public function getUserIP()
	{
		return $ip = $this->input->ip_address();
	}
	// public function userlogin()
	// {
	// 	echo "login";
	// }
}
