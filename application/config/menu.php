<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$config['menu']['users'][$i]['title'] = "User Menu";
$config['menu']['users'][$i++]['url'] = "#";
$config['menu']['users'][$i]['title'] = "All Users";
$config['menu']['users'][$i++]['url'] = "#";
$config['menu']['users'][$i]['title'] = "Add new";
$config['menu']['users'][$i++]['url'] = "#";

$i = 0; // reset for next menu
$config['menu']['settings'][$i]['title'] = "Settings";
$config['menu']['settings'][$i++]['url'] = "#";
$config['menu']['settings'][$i]['title'] = "User Manager";
$config['menu']['settings'][$i++]['url'] = "manageusers";
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
$config['menuleft']['users'][$i]['title'] = "User Menu";
$config['menuleft']['users'][$i++]['url'] = "#";
$config['menuleft']['users'][$i]['title'] = "All Users";
$config['menuleft']['users'][$i++]['url'] = "#";
$config['menuleft']['users'][$i]['title'] = "Add new";
$config['menuleft']['users'][$i++]['url'] = "#";

$i = 0; // reset for next menu
$config['menuleft']['settings'][$i]['title'] = "Settings";
$config['menuleft']['settings'][$i++]['url'] = "#";
$config['menuleft']['settings'][$i]['title'] = "User Manager";
$config['menuleft']['settings'][$i++]['url'] = "manageusers";
$config['menuleft']['settings'][$i]['title'] = "Language";
$config['menuleft']['settings'][$i++]['url'] = "language/admin_translations";
