<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userarea extends MY_Controller {

	public function user_dashboard()
	{
		$this->userBackend('userarea/dashboard');
	}

	public function add_post()
	{
		$this->userBackend('userarea/add-post');
	}

	public function post_list()
	{
		$this->userBackend('userarea/post-list');
	}

	public function user_setting()
	{
		$data['userData'] = $this->getAuthUser();
		$this->userBackend('userarea/user-setting',$data,true);
	}

	// this will change the password details
	public function change_Password()
	{
		if ($this->form_validation->run('change_password') == FALSE) {
			$data['userData'] = $this->getAuthUser();
			$this->userBackend('userarea/user-setting',$data,true);
		} else {
			if ($this->input->post('submit') == FALSE) {
				$data['userData'] = $this->getAuthUser();
				$this->userBackend('userarea/user-setting',$data,true);
			} else {
				$formdata = $this->input->post();
				$encrypted_password = md5($formdata['confirm_password']);
				$para = array('id' => $this->session->sessiondata['userid']);
				$userDetails = $this->op->get($this->TBLUSERS,$para);
				foreach ($userDetails as $user) {
					$old_password = $user->salt_password; 
				}
				if ($old_password == $formdata['old_password']) {
					$data = array(
						'encrypted_password' => $encrypted_password, 
						'salt_password' => $formdata['confirm_password'] 
					);
					$para = array('id' => $this->session->sessiondata['userid']);
					if ($this->op->modify($this->TBLUSERS,$para,$data)) {
						$msg = array('successMSG' => 'Password updated successfully');
						$this->session->set_userdata($msg);
						redirect('user/user-setting','refresh',301);
					} else {
						$msg = array('dangerMSG' => 'Somethin went wrong');
						$this->session->set_userdata($msg);
						redirect('user/user-setting','refresh',301);
					}
				} else {
					$msg = array('dangerMSG' => 'Old password does not match');
					$this->session->set_userdata($msg);
					redirect('user/user-setting');
				}
			}
			
		}				
	}
}
