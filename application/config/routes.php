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
$route['default_controller'] = 'apps';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/**
 * routes Apps
 */

$route['login_user'] 	= "auth/index";
$route['home']		 	= "apps/index";
$route['logout'] 	 	= "apps/logout";

//golongan
$route['golongan']				= "apps/golongan";
$route['tambah_golongan'] 		= "apps/tambah_golongan";
$route['edit_golongan/(:any)'] 	= "apps/edit_golongan";
$route['hapus_golongan'] 		= "apps/hapus_golongan";

//user
$route['user']  = "apps/user";
$route['edit_user'] = "apps/edit_user";
$route['hapus_user'] = "apps/hapus_user";
$route['ganti_password'] = "apps/ganti_password";
$route['tambah_user']  = "apps/tambah_user";