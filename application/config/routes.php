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
$route['default_controller'] = 'welcome';

$route['welcome/login_page'] = 'welcome/login_page';
$route['welcome/reset_pwd'] = 'welcome/reset_pwd';

$route['welcome/attendees'] = 'welcome/attendees';
$route['welcome/add_attendee'] = 'welcome/add_attendee';
$route['welcome/delete_attendee'] = 'welcome/delete_attendee';

$route['welcome/admin_project'] = 'welcome/admin_project';
$route['welcome/add_admin_project'] = 'welcome/add_admin_project';
$route['welcome/delete_admin_project'] = 'welcome/delete_admin_project';

$route['welcome/project'] = 'welcome/projects';
$route['welcome/new_project'] = 'welcome/new_project';
$route['welcome/add_project'] = 'welcome/add_project';
$route['welcome/delete_project'] = 'welcome/delete_project';

$route['welcome/topics'] = 'welcome/topics';
$route['welcome/delete_topic'] = 'welcome/delete_topic';
$route['welcome/add_topic'] = 'welcome/add_topic';

$route['welcome/topic_details'] = 'welcome/topic_details';
$route['welcome/update_topic_details'] = 'welcome/update_topic_details';
$route['welcome/add_topic_details'] = 'welcome/add_topic_details';

$route['welcome/generate_pdf'] = 'welcome/generate_pdf';

$route['welcome/copy_meeting'] = 'welcome/copy_meeting';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
