<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminarea extends MY_Controller {

	public function index()
	{	
		$loginData['loginUser'] = $this->getAuthUser();
		$username = array('email' => $this->session->sessiondata['username']);
		$loginData['loginTime'] = $this->op->getLastLoginTime($username,$this->TBLLOGINLOGS);
		$this->adminBackend('adminarea/landing-page',$loginData,true);
	}

	public function admin_dashboard()
	{	
		$data['user'] = $this->op->totalUsers();
		$data['post'] = $this->op->totalPost();
		$data['active_posts'] = $this->op->total_Active_Post();
		$data['inactive_posts'] = $this->op->total_Inactive_Post();
		$data['deleted_posts'] = $this->op->deletedPosts();
		$this->adminBackend('adminarea/dashboard',$data,true);
	}

	// this will add the posts
	public function add_post()
	{
		if ($this->form_validation->run('add_post') == FALSE) {
			$para = array('status' => '1');
			$category_details['categories'] = $this->op->get($this->TBLCATEGORY,$para);
			$this->adminBackend('adminarea/add-post',$category_details,true);
		} else {
			if ($this->input->post('submit') == false) {
				$para = array('status' => '1');
				$category_details['categories'] = $this->op->get($this->TBLCATEGORY,$para);
				$this->adminBackend('adminarea/add-post',$category_details,true);
			} else {

				$formData = $this->input->post();
				$user_id = $this->session->sessiondata['userid'];
				$date = 'IMG'.date('Ymdhis');
				$filename = $_FILES["post_img"]["name"];
				$temp_name = $_FILES["post_img"]["tmp_name"];
				if (!file_exists('upload/post')) {
					mkdir('upload/post', 0777, true);
				}
				$filename = $date;
				$folder = 'upload/post/'.$filename;
				$save_file = move_uploaded_file($temp_name,$folder);
				$data = array(
					'post_title' => $formData['post_title'],  
					'category_id' => $formData['post_category'],  
					'post_description' => $formData['post_description'],
					'post_img' => $folder,
					'user_id' => $user_id
				);
				if ($this->op->add($this->TBLPOST,$data)) {
					$msg = array('successMSG' => 'Post added successfully...');
					$this->session->set_userdata($msg);
					redirect('admin/post-list','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($msg);
					redirect('admin/add-post','refresh',301);
				}
			}
		}
	}

	// this will display the posts list
	public function post_list()
	{	
		// $para = $this->session->sessiondata['userid'];
		$data['post_data'] = $this->op->totalPostDetails();
		$this->adminBackend('adminarea/post-list',$data,true);
	}

	// this will edit the posts details
	public function edit_post()
	{
		if ($this->uri->segment(3)) {
			$para = array('id' => $this->uri->segment(3));
			$data['post_details']= $this->op->get($this->TBLPOST,$para);
			$para = array('status' => '1');
			$data['category_details']= $this->op->get($this->TBLCATEGORY,$para);
			if (!empty($data['post_details'])) {
				$this->adminBackend('adminarea/edit-post',$data,true);
			} else {
				$msg = array('dangerMSG' => 'Something went wrong');
				$this->session->set_userdata($msg);
				redirect('admin/post-list','refresh',301);
			}
		} else {
			
			if ($this->input->post('submit') == false) {
				$msg = array('dangerMSG' => 'Something went wrong...');
				$this->session->set_userdata($msg);
				redirect('admin/post-list','refresh',301);
			} else {
				$formdata = $this->input->post();
				if (!empty($_FILES['post_img']['name'])) {
					$date = 'IMG'.date('Ymdhis');
					$filename = $_FILES["post_img"]["name"];
					$temp_name = $_FILES["post_img"]["tmp_name"];
					$filename = $date;
					$folder = 'upload/post/'.$filename;
					$save_file = move_uploaded_file($temp_name, $folder);
				} else {
					$folder = $formdata['old_img'];
				}
				$data = array(
					'post_title' => $formdata['post_title'],
					'category_id' => $formdata['post_category'],
					'post_img' => $folder,
					'status' => $formdata['status'],
					'is_deleted' => $formdata['is_deleted'],
					'post_description' => $formdata['post_description']
				);
				$para = array('id' => $this->input->post('post_id'));
				if ($this->op->modify($this->TBLPOST,$para,$data)) {
					$msg = array('successMSG' => 'Post updated successfully');
					$this->session->set_userdata($msg);
					redirect('admin/post-list','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($msg);
					redirect('admin/post-list','refresh',301);
				}
			}	
			
		}
	}

	// this will delete the post
	public function deletePost()
	{
		if ($this->input->post('delete')) {
			$post_id = $this->input->post('delete');
			if ($this->op->delete($this->TBLPOST,$post_id)) {
				$msg = array('successMSG' => 'Post deleted successfully');
				$this->session->set_userdata($msg);
				redirect('admin/post-list','refresh',301);
			} else {
				$msg = array('dangerMSG' => 'Something went wrong');
				$this->session->set_userdata($msg);
				redirect('admin/post-list','refresh',301);
			}
		} else {
			$msg = array('dangerMSG' => 'Something went wrong');
			$this->session->set_userdata($msg);
			redirect('admin/post-list','refresh',301);
		}
	}
	
	// this will add the category
	public function add_category()
	{
		if ($this->form_validation->run('add_category') == false) {
			$this->adminBackend('adminarea/add-category');
		} else {
			if ($this->input->post('submit') == false) {
				$this->adminBackend('adminarea/add-category');
			} else {
				$formdata = $this->input->post();
				$data = array(
					'category_name' => $formdata['category_name']
				);

				if ($this->op->add($this->TBLCATEGORY,$data)) {
					$msg = array('successMSG' => 'Category added successfully...');
					$this->session->set_userdata($msg);
					redirect('admin/category-list','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong...');
					$this->session->set_userdata($msg);
					redirect($this->agent->referrer());
				}
			}
		}
	}

	// this will display the category list
	public function category_list()
	{
		$categoryList['catData'] = $this->op->getCategory_and_postDetails();
		$this->adminBackend('adminarea/category-list',$categoryList,TRUE);
	}

	// this will edit the category details
	public function edit_category()
	{
		if ($this->uri->segment(3)) {
			$para = array('id' => $this->uri->segment(3));
			$categoryData['category_data'] = $this->op->get($this->TBLCATEGORY,$para);
			if (empty($categoryData['category_data'])) {
				$msg = array('dangerMSG' => 'Something went wrong...');				
				$this->session->set_userdata($msg);
				redirect('admin/category-list','refresh',301);
			} else {
				$this->adminBackend('adminarea/edit-category',$categoryData,true);
			}
			
		} else {
				if ($this->input->post('submit')) {
					$formData = $this->input->post();
					$data = array(
						'category_name' => $formData['category_name'], 
						'status' => $formData['status']
					);
					$para = array('id' => $formData['cat_id']);
					if ($this->op->modify($this->TBLCATEGORY,$para,$data)) {
						$msg = array('successMSG' => 'Category updated successfully');
						$this->session->set_userdata($msg);
						redirect('admin/category-list','refresh',301);
					} else {
						$msg = array('dangerMSG' => 'Something went wrong...');				
						$this->session->set_userdata($msg);
						redirect('admin/category-list','refresh',301);
					}
				} else {
					$msg = array('dangerMSG' => 'Something went wrong...');				
					$this->session->set_userdata($msg);
					redirect('admin/category-list','refresh',301);
				}
			$msg = array('warningMSG' => 'Access denied...');				
			$this->session->set_userdata($msg);
			redirect('admin/category-list','refresh',301);
		}
	}

	// this will delete the category
	public function delete_category()
	{
		if ($this->input->post('delete')) {
			$id = $this->input->post('delete');
			if ($this->op->delete($this->TBLCATEGORY,$id)) {
				$msg = array('successMSG' => 'Category deleted successfully...');				
				$this->session->set_userdata($msg);
				redirect($this->agent->referrer());
			} else {
				$msg = array('dangerMSG' => 'Something went wrong...');				
				$this->session->set_userdata($msg);
				redirect($this->agent->referrer());
			}
		} else {
			$msg = array('dangerMSG' => 'Something went wrong...');				
			$this->session->set_userdata($msg);
			redirect('admin/category-list','refresh',301);
		}
	}

	// this will add the user
	public function add_user()
	{
		if ($this->form_validation->run('add_user') == FALSE) {
			$data['country'] = $this->op->getTable($this->TBLCOUNTRY);
			$this->adminBackend('adminarea/add-user',$data,true);
		} else {
			if ($this->input->post('submit') == false) {
				$this->adminBackend('adminarea/add-user');
			} else {
				$formdata = $this->input->post();
				$date = 'IMG'.date('Ymdhis');
				$filename = $_FILES['user_img']['name'];
				$temp_name = $_FILES['user_img']['tmp_name'];
				if (!file_exists('upload/user')) {
					mkdir('upload/user', 0777, true);
				}
				$filename = $date;
				$folder = 'upload/user/'.$date;
				$save_file = move_uploaded_file($temp_name, $folder);
				$encrypted_password = md5($formdata['confirm_password']);
				// $encrypted_password = password_hash($formdata['confirm_password'], PASSWORD_BCRYPT);

				$data = array(
					'first_name' => $formdata['first_name'], 
					'last_name' => $formdata['last_name'], 
					'username' => $formdata['username'], 
					'email' => $formdata['email'], 
					'gender' => $formdata['gender'], 
					'mobile_number' => $formdata['mobile'], 
					'user_address' => $formdata['address'], 
					'dob' => $formdata['dob'], 
					'country' => $formdata['country'], 
					'state' => $formdata['state'], 
					'city' => $formdata['city'], 
					'zipcode' => $formdata['zipcode'], 
					'user_img' => $folder,
					'encrypted_password' => $encrypted_password,
					'salt_password' => $formdata['confirm_password']
				);
				$userData = $this->op->getTable($this->TBLUSERS);
				foreach ($userData as $user) {
					$username = $user->username;
					$email = $user->email;
				}
				if ($username != $formdata['username']) {
					if ($this->op->add($this->TBLUSERS,$data)) {
						$msg = array('successMSG' => 'User added successfully');
						$this->session->set_userdata($msg);
						redirect('admin/user-list','refresh',301);
					} else {
						$msg = array('dangerMSG' => 'Something went wrong');
						$this->session->set_userdata($msg);
						redirect('admin/user-list','refresh',301);
					}	
				} else {
					$msg = array('dangerMSG' => 'Username is not available');
					$this->session->set_userdata($msg);
					redirect('admin/add-user','refresh',301);
				}
			}	
		}
	}

	// this will show the users list
	public function user_list()
	{
		$para = array('user_role' => '0' );
		$userData['user_details'] = $this->op->getPostCount_and_userDetails();
		$this->adminBackend('adminarea/user-list',$userData,true);
	}

	// this will edit the user details
	public function edit_user()
	{
		if ($this->uri->segment(3)) {
			$para = array('id' => $this->uri->segment(3));
			$data['users'] = $this->op->get($this->TBLUSERS,$para);
			$data['country'] = $this->op->getTable($this->TBLCOUNTRY);
			if (!empty($data['users'])) {
				$this->adminBackend('adminarea/edit-user',$data,true);
			} else {
				$msg = array('dangerMSG' => 'Something went wrong');
				$this->session->set_userdata($msg);
				redirect('admin/user-list','refresh',301);
			}
		} else {
				if ($this->input->post('submit') == FALSE) {
					$msg = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($msg);
					redirect('admin/user-list','refresh',301);		
				} else {
					$formdata = $this->input->post();
					$encrytped_password = md5($formdata['confirm_password']);
					if (!empty($_FILES['user_img']['name'])) {
						$date = 'IMG'.date('Ymdhis');
						$filename = $_FILES['user_img']['name'];
						$temp_name = $_FILES['user_img']['tmp_name'];
						$filename = $date;
						$folder = "upload/user/".$filename;
						$save_file = move_uploaded_file($temp_name, $folder);
					} else {
						$folder = $this->input->post('old_img');
					}
					$data = array
					(
						'first_name' =>$formdata['first_name'],
						'last_name' =>$formdata['last_name'],
						'user_img' =>$folder,
						'mobile_number' =>$formdata['mobile'],
						'gender' =>$formdata['gender'],
						'user_address' =>$formdata['address'],
						'dob' =>$formdata['dob'],
						'country' =>$formdata['country'],
						'state' =>$formdata['state'],
						'city' =>$formdata['city'],
						'zipcode' =>$formdata['zipcode'],
						'username' =>$formdata['username'],
						'email' =>$formdata['email'],
						'salt_password' =>$formdata['password'],
						'encrypted_password' =>$encrytped_password,
						'user_status' =>$formdata['status']
					);
					$para = array('id' => $formdata['user_id']);
					if ($this->op->modify($this->TBLUSERS,$para,$data)) {
						$msg = array('successMSG' => 'User updated successfully');						
						$this->session->set_userdata($msg);
						redirect('admin/user-list','refresh',301);						
					} else {
						$msg = array('dangerMSG' => 'Something went wrong');
						$this->session->set_userdata($msg);
						redirect('admin/user-list','refresh',301);
					}
				}
			$msg = array('dangerMSG' => 'Something went wrong');
			$this->session->set_userdata($msg);
			redirect('admin/user-list','refresh',301);
		}
	}

	// this will delete the user
	public function deleteUser()
	{
		if ($this->input->post('delete') == FALSE) {
			$msg = array('dangerMSG' => 'Something went wrong');
			$this->session->set_userdata($msg);
			redirect('admin/user-list','refresh',301);	
		} else {
			$para = $this->input->post('delete');
			if ($this->op->delete($this->TBLUSERS,$para)) {
				$msg = array('successMSG' => 'User deleted successfully');
				$this->session->set_userdata($msg);
				redirect('admin/user-list','refresh',301);	
			} else {
				$msg = array('dangerMSG' => 'Something went wrong');
				$this->session->set_userdata($msg);
				redirect('admin/user-list','refresh',301);	
			}
		}	
	}

	// this will update the admin basic details
	public function admin_setting()
	{
		if ($this->form_validation->run('admin_profile') == FALSE) {
			$data['loginUser'] = $this->getAuthUser();
			$this->adminBackend('adminarea/admin-setting',$data,true);	
		} else {
			if ($this->input->post('submit') == FALSE) {
				$data['loginUser'] = $this->getAuthUser();
				$this->adminBackend('adminarea/admin-setting',$data,true);				
			} else {
				$formData = $this->input->post();
				$data = array(
					'first_name' => $formData['first_name'], 
					'last_name' => $formData['last_name'], 
					'email' => $formData['email'], 
					'mobile_number' => $formData['mobile'] 
				);
				$para = array('id' => $this->session->sessiondata['userid']);
				if ($this->op->modify($this->TBLUSERS,$para,$data)) {
					$msg = array('successMSG' => 'User details updated successfully');
					$this->session->set_userdata($msg);
					redirect('admin/admin-setting','refresh',301);
				} else {
					$msg = array('dangerMSG' => 'Something went wrong');
					$this->session->set_userdata($msg);
					redirect('admin/admin-setting','refresh',301);
				}
			}
		}
	}

	// this will change the password details
	public function changePassword()
	{
		if ($this->form_validation->run('change_password') == FALSE) {
			$data['loginUser'] = $this->getAuthUser();
			$this->adminBackend('adminarea/change-password',$data,true);
		} else {
			if ($this->input->post('submit') == FALSE) {
				$data['loginUser'] = $this->getAuthUser();
				$this->adminBackend('adminarea/change-password',$data,true);
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
						redirect('admin/change-password','refresh',301);
					} else {
						$msg = array('dangerMSG' => 'Somethin went wrong');
						$this->session->set_userdata($msg);
						redirect('admin/change-password','refresh',301);
					}
				} else {
					$msg = array('dangerMSG' => 'Old password does not match');
					$this->session->set_userdata($msg);
					redirect('admin/change-password');
				}
			}
		}				
	}

	// this will change the profile picture
	public function changeProfileImage()
	{
		if ($this->input->post('submit') == FALSE) {
			$data['loginUser'] = $this->getAuthUser();
			$this->adminBackend('adminarea/admin-setting',$data,true);
		} else {
			$date = 'IMG'.date('Ymdhis');
			$filename = $_FILES['user_img']['name'];
			$temp_name = $_FILES['user_img']['tmp_name'];
			$filename = $date;
			$folder = 'upload/user/'.$filename;
			$save_file = move_uploaded_file($temp_name, $folder);
			$data = array(
				'user_img' => $folder 
			);
			$para = array('id' => $this->session->sessiondata['userid']);
			if ($this->op->modify($this->TBLUSERS,$para,$data)) {
				$msg = array('successMSG' => 'Profile picture updated successfully');
				$this->session->set_userdata($msg);
				redirect('admin/change-profile-image','refresh',301);
			} else {
				$msg = array('dangerMSG' => 'Somethin went wrong');
				$this->session->set_userdata($msg);
				redirect('admin/change-profile-image','refresh',301);
			}
			
		}
	}


}
