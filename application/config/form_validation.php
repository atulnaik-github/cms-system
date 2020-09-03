<?php 

$config = array(

	'login_validation' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[3]'
		),
	),

	'add_category' => array(
		array(
			'field' => 'category_name',
			'label' => 'Category Name',
			'rules' => 'required|max_length[20]|min_length[3]|alpha'
		), 
	),

	'add_post' => array(
		array(
			'field' => 'post_title',
			'label' => 'Post Title',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'post_category',
			'label' => 'Post Category',
			'rules' => 'required'
		),
		array(
			'field' => 'post_description',
			'label' => 'Post Description',
			'rules' => 'required'
		),
	),

	'add_user' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'mobile',
			'label' => 'Mobile Number',
			'rules' => 'required|regex_match[/^[0-9]{10}$/]'
		),
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required|min_length[10]'
		),
		array(
			'field' => 'country',
			'label' => 'Country',
			'rules' => 'required'
		),
		array(
			'field' => 'state',
			'label' => 'State',
			'rules' => 'required'
		),
		array(
			'field' => 'city',
			'label' => 'City',
			'rules' => 'required'
		),
		array(
			'field' => 'zipcode',
			'label' => 'Zipcode',
			'rules' => 'required|max_length[6]|min_length[6]'
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|min_length[5]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|min_length[6]|max_length[20]|matches[confirm_password]'
		),
		array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => 'required|min_length[6]|max_length[20]'
		),
	),
	'admin_profile' => array(
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required'
		),
		array(
			'field' => 'mobile',
			'label' => 'Mobile Number',
			'rules' => 'required|regex_match[/^[0-9]{10}$/]'
		),
	),
	'change_password' => array(
		array(
			'field' => 'old_password',
			'label' => 'Old Password',
			'rules' => 'required|min_length[3]'
		),
		array(
			'field' => 'new_password',
			'label' => 'New Password',
			'rules' => 'required|min_length[6]|max_length[20]|matches[confirm_password]'
		),
		array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => 'required|min_length[6]|max_length[20]'
		),
	),
);

?>