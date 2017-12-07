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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * Client Site
 */
// Main
$route['about'] = 'main/about';
$route['terms'] = 'main/about';
$route['privacy'] = 'main/about';

// Sign in
$route['signin'] = 'users/signin';
$route['signup'] = 'users/signup';

// Skills
$route['skills'] = 'skills/index';
$route['skills/(:any)'] = 'skills/content';

// Quest
$route['quest'] = 'quest/index';

// PvP
$route['pvp'] = 'pvp/index';

// Account
$route['account'] = 'account/index';
$route['account/history'] = 'account/history';
$route['account/rewards'] = 'account/rewards';
$route['account/profile'] = 'account/profile';
$route['account/report'] = 'account/report';

// Notification
$route['notification'] = 'notification/index';

/**
 * Admin Site
 */
// Sign In & Sign Out
$route['admin'] = 'Admin/admin/index';
$route['admin/signin'] = 'Admin/admin/signin';
$route['admin/signout'] = 'Admin/admin/signout';

// Dashboard
$route['admin/dashboard'] = 'Admin/admin/dashboard';
$route['admin/skills'] = 'Admin/skills/index';
$route['admin/skills/edit/(:any)'] = 'Admin/skills/edit_skill';
$route['admin/skills/path/(:any)'] = 'Admin/skills/path';
$route['admin/skills/path/edit/(:any)'] = 'Admin/skills/edit_path';
$route['admin/skills/path/course/(:any)'] = 'Admin/skills/course';
$route['admin/skills/path/course/edit/(:any)'] = 'Admin/skills/edit_course';
$route['admin/account'] = 'Admin/admin/account';

/**
 * Lecture Site
 */
// Sign In & Sign Out
$route['lecture'] = 'Lecture/lecture/index';

// Dashboard
$route['lecture/dashboard'] = 'Lecture/lecture/dashboard';