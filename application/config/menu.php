<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//EN menu
$i = 0;
$config['menu-en']['products'][$i]['title'] = "Products";
$config['menu-en']['products'][$i++]['url'] = "#";
$config['menu-en']['products'][$i]['title'] = "All Products";
$config['menu-en']['products'][$i++]['url'] = "admin/products";
$config['menu-en']['products'][$i]['title'] = "Advanded Search";
$config['menu-en']['products'][$i++]['url'] = "admin/products/advanced_search";
$config['menu-en']['products'][$i]['title'] = "Add New";
"Products";
$config['menu-en']['products'][$i++]['url'] = "admin/products/add_product";

$i = 0;
$config['menu-en']['orders'][$i]['title'] = "Orders";
$config['menu-en']['orders'][$i++]['url'] = "#";
$config['menu-en']['orders'][$i]['title'] = "All Orders";
$config['menu-en']['orders'][$i++]['url'] = "orders";

$i = 0;
$config['menu-en']['documents'][$i]['title'] = "Documents";
$config['menu-en']['documents'][$i++]['url'] = "#";
$config['menu-en']['documents'][$i]['title'] = "All Documents";
$config['menu-en']['documents'][$i++]['url'] = "documents";


$i = 0;
$config['menu-en']['clients'][$i]['title'] = "Clients";
$config['menu-en']['clients'][$i++]['url'] = "#";
$config['menu-en']['clients'][$i]['title'] = "All Clients";
$config['menu-en']['clients'][$i++]['url'] = "admin/clients";
$config['menu-en']['clients'][$i]['title'] = "Advanded Search";
$config['menu-en']['clients'][$i++]['url'] = "admin/clients/advanced_search";
$config['menu-en']['clients'][$i]['title'] = "Add new";
$config['menu-en']['clients'][$i++]['url'] = "admin/clients/add_client";

$i = 0; // reset for next menu
$config['menu-en']['settings'][$i]['title'] = "Settings";
$config['menu-en']['settings'][$i++]['url'] = "#";
$config['menu-en']['settings'][$i]['title'] = "Language";
$config['menu-en']['settings'][$i++]['url'] = "admin/language/admin_translations";
$config['menu-en']['settings'][$i]['title'] = "Countries";
$config['menu-en']['settings'][$i++]['url'] = "admin/countries/admin_countries";

$i = 0; // reset for next menu
$config['menuleft-en']['clients'][$i]['title'] = "Clients Menu";
$config['menuleft-en']['clients'][$i++]['url'] = "#";
$config['menuleft-en']['clients'][$i]['title'] = "All Clients";
$config['menuleft-en']['clients'][$i++]['url'] = "admin/clients";
$config['menuleft-en']['clients'][$i]['title'] = "Advanded Search";
$config['menuleft-en']['clients'][$i++]['url'] = "admin/clients/advanced_search";
$config['menuleft-en']['clients'][$i]['title'] = "Add new";
$config['menuleft-en']['clients'][$i++]['url'] = "admin/clients/add_client";

$i = 0; // reset for next menu
$config['menuleft-en']['products'][$i]['title'] = "Products Menu";
$config['menuleft-en']['products'][$i++]['url'] = "#";
$config['menuleft-en']['products'][$i]['title'] = "All Products";
$config['menuleft-en']['products'][$i++]['url'] = "admin/products";
$config['menuleft-en']['products'][$i]['title'] = "Advanded Search";
$config['menuleft-en']['products'][$i++]['url'] = "admin/products/advanced_search";
$config['menuleft-en']['products'][$i]['title'] = "Add New";
$config['menuleft-en']['products'][$i++]['url'] = "admin/products/add_product";

$i = 0; // reset for next menu
$config['menuleft']['settings'][$i]['title'] = "Settings";
$config['menuleft']['settings'][$i++]['url'] = "#";
$config['menuleft']['settings'][$i]['title'] = "User Manager";
$config['menuleft']['settings'][$i++]['url'] = "manageusers";
$config['menuleft']['settings'][$i]['title'] = "Language";
$config['menuleft']['settings'][$i++]['url'] = "language/admin_translations";

//ES menu

$i = 0;
$config['menu-es']['products'][$i]['title'] = "Products";
$config['menu-es']['products'][$i++]['url'] = "#";
$config['menu-es']['products'][$i]['title'] = "All Products";
$config['menu-es']['products'][$i++]['url'] = "products";
$config['menu-es']['products'][$i]['title'] = "Advanded Search";
$config['menu-es']['products'][$i++]['url'] = "products/advanced_search";

$i = 0;
$config['menu-es']['orders'][$i]['title'] = "Orders";
$config['menu-es']['orders'][$i++]['url'] = "#";
$config['menu-es']['orders'][$i]['title'] = "All Orders";
$config['menu-es']['orders'][$i++]['url'] = "orders";

$i = 0;
$config['menu-es']['documents'][$i]['title'] = "Documents";
$config['menu-es']['documents'][$i++]['url'] = "#";
$config['menu-es']['documents'][$i]['title'] = "All Documents";
$config['menu-es']['documents'][$i++]['url'] = "documents";


$i = 0;
$config['menu-es']['clients'][$i]['title'] = "Clients";
$config['menu-es']['clients'][$i++]['url'] = "#";
$config['menu-es']['clients'][$i]['title'] = "All Clients";
$config['menu-es']['clients'][$i++]['url'] = "clients";
$config['menu-es']['clients'][$i]['title'] = "Advanded Search";
$config['menu-es']['clients'][$i++]['url'] = "clients/advanced_search";
$config['menu-es']['clients'][$i]['title'] = "Add new";
$config['menu-es']['clients'][$i++]['url'] = "#";

$i = 0; // reset for next menu
$config['menu-es']['settings'][$i]['title'] = "Settings";
$config['menu-es']['settings'][$i++]['url'] = "#";
$config['menu-es']['settings'][$i]['title'] = "Language";
$config['menu-es']['settings'][$i++]['url'] = "admin/language/admin_translations";
$config['menu-es']['settings'][$i]['title'] = "Countries";
$config['menu-es']['settings'][$i++]['url'] = "admin/countries/admin_countries";

$i = 0; // reset for next menu
$config['menuleft']['clients'][$i]['title'] = "Clients Menu";
$config['menuleft']['clients'][$i++]['url'] = "#";
$config['menuleft']['clients'][$i]['title'] = "All Clients";
$config['menuleft']['clients'][$i++]['url'] = "clients";
$config['menuleft']['clients'][$i]['title'] = "Advanded Search";
$config['menuleft']['clients'][$i++]['url'] = "clients/advanced_search";
$config['menuleft']['clients'][$i]['title'] = "Add new";
$config['menuleft']['clients'][$i++]['url'] = "#";


$i = 0; // reset for next menu
$config['menuleft']['settings'][$i]['title'] = "Settings";
$config['menuleft']['settings'][$i++]['url'] = "#";
$config['menuleft']['settings'][$i]['title'] = "User Manager";
$config['menuleft']['settings'][$i++]['url'] = "manageusers";
$config['menuleft']['settings'][$i]['title'] = "Language";
$config['menuleft']['settings'][$i++]['url'] = "language/admin_translations";
