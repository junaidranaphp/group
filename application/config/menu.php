<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$i = 0;
$config['menu']['products'][$i]['title'] = "Products";
$config['menu']['products'][$i++]['url'] = "#";
$config['menu']['products'][$i]['title'] = "All Products";
$config['menu']['products'][$i++]['url'] = "products";
$config['menu']['products'][$i]['title'] = "Advanded Search";
$config['menu']['products'][$i++]['url'] = "products/advanced_search";

$i = 0;
$config['menu']['orders'][$i]['title'] = "Orders";
$config['menu']['orders'][$i++]['url'] = "#";
$config['menu']['orders'][$i]['title'] = "All Orders";
$config['menu']['orders'][$i++]['url'] = "orders";

$i = 0;
$config['menu']['documents'][$i]['title'] = "Documents";
$config['menu']['documents'][$i++]['url'] = "#";
$config['menu']['documents'][$i]['title'] = "All Documents";
$config['menu']['documents'][$i++]['url'] = "documents";


$i = 0;
$config['menu']['clients'][$i]['title'] = "Clients";
$config['menu']['clients'][$i++]['url'] = "#";
$config['menu']['clients'][$i]['title'] = "All Clients";
$config['menu']['clients'][$i++]['url'] = "clients";
$config['menu']['clients'][$i]['title'] = "Advanded Search";
$config['menu']['clients'][$i++]['url'] = "clients/advanced_search";
$config['menu']['clients'][$i]['title'] = "Add new";
$config['menu']['clients'][$i++]['url'] = "#";

$i = 0; // reset for next menu
$config['menu']['settings'][$i]['title'] = "Settings";
$config['menu']['settings'][$i++]['url'] = "#";
$config['menu']['settings'][$i]['title'] = "Language";
$config['menu']['settings'][$i++]['url'] = "language/admin_translations";


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
