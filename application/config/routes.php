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
//$route['module_name'] = 'home/welcome';
$route['default_controller'] = "home";
$route['404_override'] = '';
//$route['sp/(:num)'] = "sanpham/$1";
$route['tin-tuc'] = 'home/news';
 
$route['sp-(:any)'] = 'home/details/$1';
$route['sanpham'] = 'home/product';
$route['danh-muc-([a-zA-Z0-9_-]+)'] = 'home/categories/$1';
$route['danh-muc-(:any)'] = 'home/categories/$1';
$route['tim-kiem'] = 'home/search';
$route['tim-theo-gia/(:any)'] = "home/search_by_cost/$1";
$route['ban-chay'] = 'home/hotproduct';
$route['qua-tang'] = 'home/giftcard';
$route['gui-qua-thanh-cong/(:any)'] = 'home/successfull/$1';
$route['muc-tin-(:any)'] = "home/catenews/$1";
$route['tin-(:any)'] = "home/details_news/$1";
$route['dat-hang-(:any)'] = "home/buynow/$1";
$route['dang-ky'] = "home/register";
$route['dang-nhap'] = "home/login";
$route['dang-xuat'] = "home/logout";
$route['thong-tin-ca-nhan'] = "home/member";
$route['gio-hang-cua-ban'] = "home/yourcart";
$route['loai-bo/(:any)'] = "home/remove_order/$1";
$route['cam-on-quy-khach'] = "home/thankyou";

/* End of file routes.php */
/* Location: ./application/config/routes.php */