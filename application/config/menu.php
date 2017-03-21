<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$i = 0;
$config['menu']['clients'][$i]['title'] = "Clients Menu";
$config['menu']['clients'][$i++]['url'] = "#";
$config['menu']['clients'][$i]['title'] = "All Clients";
$config['menu']['clients'][$i++]['url'] = "/clients";
$config['menu']['clients'][$i]['title'] = "Advanded Search";
$config['menu']['clients'][$i++]['url'] = "#";
$config['menu']['clients'][$i]['title'] = "Add new";
$config['menu']['clients'][$i++]['url'] = "#";

//the top menu is identical except for the title
$config['menu']['clients_top'] = $config['menu']['clients'];
$config['menu']['clients_top'][0]['title'] = "Clients";

$i = 0; // reset for next menu
$config['menu']['users'][$i]['title'] = "User Menu";
$config['menu']['users'][$i++]['url'] = "#";
$config['menu']['users'][$i]['title'] = "All Users";
$config['menu']['users'][$i++]['url'] = "#";
$config['menu']['users'][$i]['title'] = "Add new";
$config['menu']['users'][$i++]['url'] = "#";

$i = 0; // reset for next menu
$config['menu']['settings_top'][$i]['title'] = "Settings";
$config['menu']['settings_top'][$i++]['url'] = "#";
$config['menu']['settings_top'][$i]['title'] = "User Manager";
$config['menu']['settings_top'][$i++]['url'] = "manageusers";
$config['menu']['settings_top'][$i]['title'] = "Locations";
$config['menu']['settings_top'][$i++]['url'] = "locations";
$config['menu']['settings_top'][$i]['title'] = "Residences";
$config['menu']['settings_top'][$i++]['url'] = "residences";
$config['menu']['settings_top'][$i]['title'] = "Listing Fields";
$config['menu']['settings_top'][$i++]['url'] = "listfield";
$config['menu']['settings_top'][$i]['title'] = "Language";
$config['menu']['settings_top'][$i++]['url'] = "language/admin_translations";