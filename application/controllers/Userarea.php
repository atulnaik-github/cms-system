<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userarea extends MY_Controller {

	public function index()
	{	
		$this->userBackend('userarea/dashboard');
	}

	// this will add the post
	public function add_post()
	{
		$para = array('status' => '1');
		$data['category'] = $this->op->get($this->TBLCATEGORY,$para);
		if ($this->form_validation->run('add_post') == FALSE) {
			$this->userBackend('userarea/add-post',$data,true);
		} else {
			if ($this->input->post('submit') == FALSE) {	
				$this->userBackend('userarea/add-post',$data,true);
			} else {
				$formdata = $this->input->post();
				$date = 'IMG'.date('Ymdhis');
				$filename = $_FILES['post_img']['name'];
				$temp_name = $_FILES['post_img']['tmp_name'];
				if (!file_exists('upload/post')) {
					mkdir('upload/post', 0777, true);
				}
				$filename = $date;
				$folder = 'upload/post/'.$filename;
				$save_file = move_uploaded_file($temp_name, $folder);
				$user_id = $this->session->sessiondata['userid'];
				$data = array(
					'post_title' => $formdata['post_title'], 
					'category_id' => $formdata['post_category'], 
					'post_description' => $formdata['post_description'], 
					'post_img' => $folder,
					'user_id' => $user_id
				);	
				if ($this->op->add($this->TBLPOST,$data)) {
					$msg = array('successMSG' => 'Post added successfully');
					$this->session->set_userdata($msg);
					redirect('user/post-list','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($msg);
					redirect('user/post-list','refresh',301);
				}
			}
		}
	}

	// this will display the post list
	public function post_list()
	{
		$para = $this->session->sessiondata['userid'];
		$data['postDetails'] = $this->op->getUserPostDetails($para);
		$this->userBackend('userarea/post-list',$data,true);
	}

	// this will edit the post details
	public function edit_post()
	{
		if ($this->uri->segment(3)) {
			$data = array('id' => $this->uri->segment(3));
			$result['postDetails'] = $this->op->get($this->TBLPOST,$data);
			$para = array('status' => '1');
			$result['postCategory'] = $this->op->get($this->TBLCATEGORY,$para);
			if (!empty($result['postDetails'])) {
				$this->userBackend('userarea/edit-post',$result,true);
			} else {
				$array = array('dangerMSG' => 'Something went wrong');
				$this->session->set_userdata($array);
				redirect('user/post-list','refresh',301);
			}
		} else {
			if ($this->form_validation->run('add_post') == FALSE) {
				redirect($this->agent->referrer());
			} else {
				if ($this->input->post('submit') == FALSE) {
					$array = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($array);
					redirect('user/post-list','refresh',301);
				} else {
					$formdata = $this->input->post();
					if (empty($_FILES['post_img']['name'])) {
						$folder = $formdata['old_img'];
					} else {
						$date = "IMG".date('Ymdhis');
						$fileName = $_FILES["post_img"]["name"];
						$temp_name = $_FILES["post_img"]["tmp_name"];
						$fileName = $date;
						$folder = 'upload/post/'.$fileName;
						$save_file = move_uploaded_file($temp_name, $folder);
					}
					$data = array(
						'post_title' => $formdata['post_title'], 
						'category_id' => $formdata['post_category'], 
						'post_img' => $folder,
						'post_description' => $formdata['post_description']
					);
					$para = array('id' => $this->input->post('post_id'));
					if ($this->op->modify($this->TBLPOST,$para,$data)) {
						$array = array('successMSG' => 'Post updated successfully');
						$this->session->set_userdata($array);
						redirect('user/post-list','refresh',301);
					} else {
						$array = array('dangerMSG' => 'Something went wrong');
						$this->session->set_userdata($array);
						redirect('user/post-list','refresh',301);
					}
				}
			}
			redirect('user/post-list','refresh',301);
		}
	}

	// this will display the user data who logged in
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

	// this will edit the basic profile details of the user
	public function basicDetails()
	{
		if ($this->form_validation->run('user_profile') == FALSE) {
			$data['userData'] = $this->getAuthUser();
			$this->userBackend('userarea/user-setting',$data,true);
		} else {
			if ($this->input->post('save') == FALSE) {
				$data['userData'] = $this->getAuthUser();
				$this->userBackend('userarea/user-setting',$data,true);
			} else {
				$formdata = $this->input->post();
				$data = array(
					'email' => $formdata['email'], 
					'mobile_number' => $formdata['mobile'] 
				);
				$para = array('id' => $this->session->sessiondata['userid']);
				if ($this->op->modify($this->TBLUSERS,$para,$data)) {
					$msg = array('successMSG' => 'User details updated successfully...');						
					$this->session->set_userdata($msg);
					redirect('user/user-setting','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong...');						
					$this->session->set_userdata($msg);
					redirect('user/user-setting','refresh',301);
				}
			}
		}
	}

	// this will change the user profile details
	public function changeProfilePicture()
	{
		if ($this->input->post('submit') == FALSE) {
			redirect('user/user-setting','refresh',301);		
		} else {
			$date = "IMG".date('Ymdhis');
			$filename = $_FILES['user_img']['name'];
			$temp_name= $_FILES['user_img']['tmp_name'];
			$filename = $date;
			$folder = 'upload/user/'.$filename;
			$save_file = move_uploaded_file($temp_name, $folder);
			$data = array('user_img' => $folder);
			$para = array('id' => $this->session->sessiondata['userid']);
			if ($this->op->modify($this->TBLUSERS,$para,$data)) {
				$msg = array('successMSG' => 'Profile picture updated successfully...');						
				$this->session->set_userdata($msg);
				redirect('user/user-setting','refresh',301);
			} else {
				$msg = array('dangerMSG' => 'Something went wrong...');						
				$this->session->set_userdata($msg);
				redirect('user/user-setting','refresh',301);
			}
		}
	}
}
