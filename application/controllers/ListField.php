<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start(); //we need to call PHP's session object to access it through CI

class ListField extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ListFields');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in'))
        {
            $lang = $this->session->userdata('language');
            $list1 = array();
            $list2 = array();
            $list3 = array();
            $list4 = array();

            $list_options1 = array(array('obj_type','objekttyp'), array('global_bauart','bauart'), array('obj_renting_conditions','mietart'), array('obj_listing_type','angebotsart'), array('obj_deposit','kaution'), array('obj_residential_status','wohnstatus'), array('listfield_location','lage'), array('obj_orientation','ausrichtung'), array('listfield_view','blick'), array('obj_renting_time','mietdauer'), array('listfield_image_tags','image_tags'));
            $list_options2 = array(array('global_anrede','anrede'), array('adr_category','ZusatzKontaktArten'), array('global_contact_form','kontaktform'), array('global_additional_data','zusatzdaten'), array('global_quelle','kundenaquise'), array('adr_valoration','bewertung'), array('global_contact_forms','kontaktart'), array('global_calendar_entry_forms','kalendereintragart'), array('listfield_contact_history_action_field','kontakthistorie_aktion'));
            $list_options3 = array(array('Printmedium Name','marketing_print_name'), array('Portal Name','marketing_internet_name'), array('Textarchiv Name','marketing_textarchiv_name'));
            $list_options4 = array(array('global_countries','laender'), array('global_regions','region'));

            foreach ($list_options1 as $val)
            {
                $count = $this->ListFields->getListFieldItemCount($val[1]);
                $translation = $this->ListFields->getTranslation($val[0],$lang);
                array_push($list1, array('field' => $translation[0]->$lang, 'count' => $count));
            }
            foreach ($list_options2 as $val)
            {
                $count = $this->ListFields->getListFieldItemCount($val[1]);
                $translation = $this->ListFields->getTranslation($val[0],$lang);
                array_push($list2, array('field' => $translation[0]->$lang, 'count' => $count));
            }
            foreach ($list_options3 as $val)
            {
                $count = $this->ListFields->getListFieldItemCount($val[1]);
                //$translation = $this->ListFields->getTranslation($val[0],$lang);
                array_push($list3, array('field' => $val[0], 'count' => $count));
            }
            foreach ($list_options4 as $val)
            {
                $count = $this->ListFields->getListFieldItemCount($val[1]);
                $translation = $this->ListFields->getTranslation($val[0],$lang);
                array_push($list4, array('field' => $translation[0]->$lang, 'count' => $count));
            }
            $data['title'] = LTEXT('_adressen_all');
            $data['listItem1'] = $list1;
            $data['listItem2'] = $list2;
            $data['listItem3'] = $list3;
            $data['listItem4'] = $list4;
            $data['session'] = $this->session->userdata;

            $this->load->view('includes/header', $data);
            $this->load->view('includes/toolbar', $data);
            $this->load->view('includes/menu_left_clients', $data);
            $this->load->view('listFields/index', $data);
            $this->load->view('includes/footer');
        } else
        {
            redirect('login', 'refresh');
        }
    }

    Function ListFieldItems($name = NULL)
    {
        if ($this->session->userdata('logged_in'))
        {
            $items = $this->ListFields->getListFieldItemsByName($name);
            $data['title'] = LTEXT('_adressen_all');
            $data['listItems'] = $items;
            $data['name'] = $name;
            $data['session'] = $this->session->userdata;

            $this->load->view('includes/header', $data);
            $this->load->view('includes/toolbar', $data);
            $this->load->view('includes/menu_left_clients', $data);
            $this->load->view('listFields/details', $data);
            $this->load->view('includes/footer');
        } else
        {
            redirect('login', 'refresh');
        }
    }

}
