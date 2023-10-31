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
$route['default_controller'] = 'home';

$route['admin'] = '404_override';
$route['admin/index'] = '404_override';
$route['admin/logout'] = 'login/keluar';
$route['admin/dashboard'] = 'admin/index';
$route['admin/master/kategori'] = 'admin/kategori';
$route['admin/master/kategori/new'] = 'admin/kategori_add';
$route['admin/master/kategori/edit/(:num)'] = 'admin/kategori_edit/$1';
$route['admin/master/kategori/hapus/(:num)'] = 'admin/kategori_del/$1';
$route['admin/master/menu'] = 'admin/menu';
$route['admin/master/menu/new'] = 'admin/menu_add';
$route['admin/master/menu/edit/(:any)'] = 'admin/menu_edit/$1';
$route['admin/master/menu/hapus/(:any)'] = 'admin/menu_del/$1';
$route['admin/akses/new'] = 'admin/akses_add';
$route['admin/akses/edit/(:any)'] = 'admin/akses_edit/$1';
$route['admin/akses/hapus/(:any)'] = 'admin/akses_del/$1';
$route['admin/meja/new'] = 'admin/meja_add';
$route['admin/meja/terpakai/(:num)'] = 'admin/meja_yes/$1';
$route['admin/meja/kosongkan/(:num)'] = 'admin/meja_no/$1';
$route['admin/meja/hapus/(:num)'] = 'admin/meja_del/$1';
$route['admin/laporan/transaksi'] = 'admin/lap_transaksi';
$route['admin/laporan/transaksi/print'] = 'admin/lap_transaksi_print';
$route['admin/laporan/transaksi/excel'] = 'admin/lap_transaksi_excel';
$route['admin/laporan/transaksi/print/(:any)/(:any)'] = 'admin/lap_transaksi_print/$1/$2';
$route['admin/laporan/transaksi/excel/(:any)/(:any)'] = 'admin/lap_transaksi_excel/$1/$2';

$route['kasir'] = '404_override';
$route['kasir/index'] = '404_override';
$route['kasir/logout'] = 'login/keluar';
$route['kasir/dashboard'] = 'kasir/index';
$route['kasir/transaksi/selesai/(:any)'] = 'kasir/transaksi_done/$1';
$route['kasir/transaksi/struk/(:any)'] = 'kasir/struk/$1';
$route['kasir/transaksi/konfirmasi/(:any)'] = 'kasir/transaksi_confirm/$1';

$route['koki'] = '404_override';
$route['koki/index'] = '404_override';
$route['koki/logout'] = 'login/keluar';
$route['koki/dashboard'] = 'koki/index';
$route['koki/transaksi/konfirmasi/(:any)'] = 'koki/transaksi_confirm/$1';

$route['home'] = '404_override';
$route['home/index'] = '404_override';
$route['cart/add/(:any)'] = 'home/cart_get/$1';
$route['cart/update'] = 'home/cart_ubah';
$route['cart/delete/(:any)'] = 'home/cart_trash/$1';
$route['cart/empty'] = 'home/cart_kosong';
$route['order-menu'] = 'home/sev_trx';
$route['invoice/(:any)'] = 'home/struk/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
