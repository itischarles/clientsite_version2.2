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



/**AUTHENTICATE*****/
$route['login'] = "Authenticate/login";
$route['logout'] = "Authenticate/logout";



/**
 * users /client
 */
$route['client/(:any)/documents'] = "Document/list_documents/$1";
$route['client/(:any)/document/(:num)'] = "Document/view_documents/$1/$2";
$route['client/(:any)'] = "Users/userDashboard/$1";
$route['search-clients'] = "Users/searchUsers";
$route['client/(:any)/upload-documents'] = "Users/manualUploadDocument/$1";




/*********APPLICATIONS *********/
//$route['client/(:any)/application/new/sipp'] = "Application/new_Application/$1/$2";
//$route['client/(:any)/application/new/isa'] = "Application/new_Application/$1/$2";
//$route['client/(:any)/application/new/gia'] = "Application/new_Application/$1/$2";


$types = array('sipp', 'pension', 'isa', 'bond', 'gia');

foreach ($types as $key => $type){
  
    $route['client/(:any)/illustrations/new/' . $type] = "illustration/new_illustration/$1/" . $type;
   // $route['client/(:any)/illustrations/new/' . $type . '/(:num)'] = "illustration/new_illustration/$1/" . $type . "/$2";

    $route['client/(:any)/application/new/' . $type] = "Application/new_Application/$1/" . $type;
    $route['client/(:any)/transfer/new/(:num)'] = "Transfer/new_Transfer/$1/$2";
}

$route['client/(:any)/application/(:num)'] = "Application/index/$1/$2";
$route['client/(:any)/transfer/(:num)'] = "Transfer/index/$1/$2";



/**
 * MESSAGES
 */

$route['messages/(:any)'] = "Messages/index/$1";





/** API**/

$route['api/client/new'] = "api/API_web/addNewClient_Post";
$route['api/client/update'] = "api/API_web/_updateClient_Post";
$route['api/client/upload'] = "api/API_web/_uploadDocument_Post";



$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
