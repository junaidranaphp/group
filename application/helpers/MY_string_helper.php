<?php
/**

 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * RedB String Helpers
 *
 * @package		RedB
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Ralf Tenbrink
 * @link		
 */

// ------------------------------------------------------------------------

function stringURLSafe($string)
{
        //remove any '-' from the string they will be used as concatonater
        $str = str_replace('-', ' ', $string);
  
        // remove any duplicate whitespace, and ensure all characters are alphanumeric
        $str = preg_replace(array('/\s+/','/[^A-Za-z0-9\-]/'), array('-',''), $str);
 
        // lowercase and trim
        $str = trim(strtolower($str));
        return $str;
}

function LTEXT($phrase){
	if (get_instance()->session->has_userdata('language'))
	{
		$lang = get_instance()->session->userdata['language'] ;
	}
	else
	{
		$lang = 'en';
	}
    $sql = "SELECT $lang FROM " . get_instance()->db->dbprefix('language_admin') . " WHERE token = '$phrase'";
	$query = get_instance()->db->query($sql);
	
	$row = $query->row();
	
	if(isset($row) and ! empty($row->$lang)){               
        return $row->$lang;
    }
	else {
		return $phrase;
	}
}

function sorting($field) {
	$tmp = '<div class="sort"><i data-field="'.$field.'" data-sort="asc" class="fa fa-caret-up"></i><i data-field="'.$field.'" data-sort="desc" class="fa fa-caret-down"></i></div>';
	return $tmp;
}

function getMenu($menu_group){
	$menu = get_instance()->config->item('menu');	
	return $menu[$menu_group];
	
}
function printMenu($menu_group, $title_only = false){
	$menu = getMenu($menu_group);
	if ($title_only) {
		if ($menu[0]['url'] == "#" || empty($menu[0]['url']) ) {
			$menuhtml = $menu[0]['title'];
		} else {
			$menuhtml .= "<a href='{$menu[0]['url']}'>{$menu[0]['title']}";
		}
	} else {
		$menuhtml = "";
		for ($i=1; $i < count($menu); $i++){
			$menuhtml .= "<li><a href='{$menu[$i]['url']}'>{$menu[$i]['title']}</a>";
		}
	}
	return $menuhtml;
	
}
function set_validation_messages()
{
	$ci =&get_instance();
	$ci->form_validation->set_message('required',  LTEXT('_required_field_error'));
	$ci->form_validation->set_message('is_unique',  LTEXT('_is_unique_field_error'));
	$ci->form_validation->set_message('matches',  LTEXT('_matches_field_error'));
	$ci->form_validation->set_message('valid_email',  LTEXT('_valid_email_field_error'));
}