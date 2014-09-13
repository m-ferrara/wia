<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

// GENERATOR ROUTES
$route['generators/controllers'] = "graphic_display/knockout/controllers_generator";
$route['generators/models'] = "graphic_display/knockout/models_generator";
$route['generators/routes'] = "graphic_display/knockout/routes_generator";



// API - ROUTES
/* - - - Citation ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/citation'] = "webservice/Citation/";
$route['webservice/citation/(:any)/(:num)/(:any)/(:any)']  = "webservice/Citation/$1/$2/$3/$4";
$route['webservice/citation/(:any)/(:any)/(:any)/(:any)']  = "webservice/Citation/$1/$2/$3/$4";
/* - - - Comment ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/comment'] = "webservice/Comment/";
$route['webservice/comment/(:any)/(:num)/(:any)/(:any)']  = "webservice/Comment/$1/$2/$3/$4";
$route['webservice/comment/(:any)/(:any)/(:any)/(:any)']  = "webservice/Comment/$1/$2/$3/$4";
/* - - - Earn ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/earn'] = "webservice/Earn/";
$route['webservice/earn/(:any)/(:num)/(:any)/(:any)']  = "webservice/Earn/$1/$2/$3/$4";
$route['webservice/earn/(:any)/(:any)/(:any)/(:any)']  = "webservice/Earn/$1/$2/$3/$4";
/* - - - Favorite ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/favorite'] = "webservice/Favorite/";
$route['webservice/favorite/(:any)/(:num)/(:any)/(:any)']  = "webservice/Favorite/$1/$2/$3/$4";
$route['webservice/favorite/(:any)/(:any)/(:any)/(:any)']  = "webservice/Favorite/$1/$2/$3/$4";
/* - - - Meta ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/meta'] = "webservice/Meta/";
$route['webservice/meta/(:any)/(:num)/(:any)/(:any)']  = "webservice/Meta/$1/$2/$3/$4";
$route['webservice/meta/(:any)/(:any)/(:any)/(:any)']  = "webservice/Meta/$1/$2/$3/$4";
/* - - - Share ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/share'] = "webservice/Share/";
$route['webservice/share/(:any)/(:num)/(:any)/(:any)']  = "webservice/Share/$1/$2/$3/$4";
$route['webservice/share/(:any)/(:any)/(:any)/(:any)']  = "webservice/Share/$1/$2/$3/$4";
/* - - - Tag ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/tag'] = "webservice/Tag/";
$route['webservice/tags'] = "webservice/Tag/tags";

$route['webservice/tag/(:any)/(:num)/(:any)/(:any)']  = "webservice/Tag/$1/$2/$3/$4";
$route['webservice/tag/(:any)/(:any)/(:any)/(:any)']  = "webservice/Tag/$1/$2/$3/$4";
/* - - - Category ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/category/(:any)/(:num)']  = "webservice/Category/index/$1/$2";

$route['webservice/category'] = "webservice/Category/";
$route['webservice/categories'] = "webservice/Category/categories";

$route['webservice/category/(:any)/(:num)/(:any)/(:any)']  = "webservice/Category/$1/$2/$3/$4";
$route['webservice/category/(:any)/(:any)/(:any)/(:any)']  = "webservice/Category/$1/$2/$3/$4";
/* - - - User ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/user'] = "webservice/User/";
$route['webservice/user/authenticated'] = "webservice/User/authenticate";
$route['webservice/user/(:any)/(:num)/(:any)/(:any)']  = "webservice/User/$1/$2/$3/$4";
$route['webservice/user/(:any)/(:any)/(:any)/(:any)']  = "webservice/User/$1/$2/$3/$4";
/* - - - Vote ROUTES 
* 
* v0.0.2  Notes: Auto-Gen(5-27-2014)
* - - - */
$route['webservice/vote'] = "webservice/Vote/";
$route['webservice/vote/(:any)/(:num)/(:any)/(:any)']  = "webservice/Vote/$1/$2/$3/$4";
$route['webservice/vote/(:any)/(:any)/(:any)/(:any)']  = "webservice/Vote/$1/$2/$3/$4";

/* - - - Citation ROUTES 
* 
* v0.0.1  Notes: Auto-Gen(3-6-2014)
* - - - */
//$route['webservice/citation'] = "webservice/Citation/citations";
//$route['webservice/citation/(:any)/(:num)/(:any)/(:any)']  = "webservice/Citation/citation/$1/$2/$3/$4";
//$route['webservice/citation/(:any)/(:any)/(:any)/(:any)']  = "webservice/Citation/citation/$1/$2/$3/$4";
///* - - - Comment ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/comment'] = "webservice/Comment/comment";
//$route['webservice/comment/(:any)/(:num)/(:any)/(:any)']  = "webservice/Comment/comment/$1/$2/$3/$4";
//$route['webservice/comment/(:any)/(:any)/(:any)/(:any)']  = "webservice/Comment/comment/$1/$2/$3/$4";
///* - - - Earn ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/earn'] = "webservice/Earn/earn";
//$route['webservice/earn/(:any)/(:num)/(:any)/(:any)']  = "webservice/Earn/earn/$1/$2/$3/$4";
//$route['webservice/earn/(:any)/(:any)/(:any)/(:any)']  = "webservice/Earn/earn/$1/$2/$3/$4";
///* - - - Favorite ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/favorite'] = "webservice/Favorite/favorite";
//$route['webservice/favorite/(:any)/(:num)/(:any)/(:any)']  = "webservice/Favorite/favorite/$1/$2/$3/$4";
//$route['webservice/favorite/(:any)/(:any)/(:any)/(:any)']  = "webservice/Favorite/favorite/$1/$2/$3/$4";
///* - - - Meta ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/meta'] = "webservice/Meta/meta";
//$route['webservice/meta/(:any)/(:num)/(:any)/(:any)']  = "webservice/Meta/meta/$1/$2/$3/$4";
//$route['webservice/meta/(:any)/(:any)/(:any)/(:any)']  = "webservice/Meta/meta/$1/$2/$3/$4";
///* - - - Share ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/share'] = "webservice/Share/share";
//$route['webservice/share/(:any)/(:num)/(:any)/(:any)']  = "webservice/Share/share/$1/$2/$3/$4";
//$route['webservice/share/(:any)/(:any)/(:any)/(:any)']  = "webservice/Share/share/$1/$2/$3/$4";
///* - - - Tag ROUTES
//* 
//* v0.0.1  Notes: 4-15-14 ~ Added tags route to return List of All Tags.
//* - - - */
//$route['webservice/tag'] = "webservice/Tag/tag";
//$route['webservice/tags'] = "webservice/Tag/tags";
//
//$route['webservice/category'] = "webservice/Tag/category";
//$route['webservice/categories'] = "webservice/Tag/categories";
//
//
//$route['webservice/tags/(:any)/(:any)'] = "webservice/Tag/tags/$1/$2";
//$route['webservice/tag/(:any)/(:num)/(:any)/(:any)']  = "webservice/Tag/tag/$1/$2/$3/$4";
//$route['webservice/tag/(:any)/(:any)/(:any)/(:any)']  = "webservice/Tag/tag/$1/$2/$3/$4";
///* - - - User ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/user'] = "webservice/User";
//$route['webservice/user/login'] = "webservice/User/login";
//$route['webservice/user/register'] = "webservice/User/user";
//
//$route['webservice/user/authenticated'] = "webservice/User/authenticate";
//$route['webservice/user/(:any)/(:num)/(:any)/(:any)']  = "webservice/User/user/$1/$2/$3/$4";
//$route['webservice/user/(:any)/(:any)/(:any)/(:any)']  = "webservice/User/user/$1/$2/$3/$4";
///* - - - Vote ROUTES 
//* 
//* v0.0.1  Notes: Auto-Gen(3-6-2014)
//* - - - */
//$route['webservice/vote'] = "webservice/Vote/vote";
//$route['webservice/vote/(:any)/(:num)/(:any)/(:any)']  = "webservice/Vote/vote/$1/$2/$3/$4";
//$route['webservice/vote/(:any)/(:any)/(:any)/(:any)']  = "webservice/Vote/vote/$1/$2/$3/$4";

/* End of file routes.php */
/* Location: ./application/config/routes.php */