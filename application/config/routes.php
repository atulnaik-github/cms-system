
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'CMS';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// admin routes

$route['admin'] = 'Adminarea';
$route['admin/dashboard'] = 'Adminarea/admin_dashboard';
$route['admin/add-post'] = 'Adminarea/add_post';
$route['admin/post-list'] = 'Adminarea/post_list';
$route['admin/edit-post/:num'] = 'Adminarea/edit_post/$1';
$route['admin/edit-post'] = 'Adminarea/edit_post';
$route['admin/delete-post'] = 'Adminarea/deletePost';
$route['admin/add-category'] = 'Adminarea/add_category';
$route['admin/category-list'] = 'Adminarea/category_list';
$route['admin/edit-category/:num'] = 'Adminarea/edit_category/$1';
$route['admin/edit-category'] = 'Adminarea/edit_category';
$route['admin/delete-category'] = 'Adminarea/delete_category';
$route['admin/add-user'] = 'Adminarea/add_user';
$route['admin/user-list'] = 'Adminarea/user_list';
$route['admin/edit-user/:num'] = 'Adminarea/edit_user/$1';
$route['admin/edit-user'] = 'Adminarea/edit_user';
$route['admin/delete-user'] = 'Adminarea/deleteUser';
$route['admin/admin-setting'] = 'Adminarea/admin_setting';
$route['admin/change-password'] = 'Adminarea/changePassword';
$route['admin/change-profile-image'] = 'Adminarea/changeProfileImage';

// user routes
$route['user'] = 'Userarea';
$route['user/add-post'] = 'Userarea/add_post';
$route['user/post-list'] = 'Userarea/post_list';
$route['user/edit-post/:num'] = 'Userarea/edit_post/$1';
$route['user/edit-post'] = 'Userarea/edit_post';
$route['user/user-setting'] = 'Userarea/user_setting';
$route['user/change-password'] = 'Userarea/change_Password';
$route['user/change-profile-image'] = 'Userarea/changeProfileImage';
$route['user/basic-details'] = 'Userarea/basicDetails';
$route['user/change-profile-image'] = 'Userarea/changeProfilePicture';

// login routes
$route['login'] = 'login';
// $route[''] = 'Userarea/user_setting';
