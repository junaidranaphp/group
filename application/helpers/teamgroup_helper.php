<?php
defined('BASEPATH') or die('direct access are not allowed');
function get_pagination_config($url, $rows, $per_page) {

    $config['base_url'] = $url;
    $config['total_rows'] = $rows;
    $config['per_page'] = $per_page;
    $config['use_page_numbers'] = false;
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] = "</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    return $config;
}
function get_sorting_preferences($page, $default_field, $default_order) {
    /*
     * case 0 : insert preference
     * case 1 : update preference
     * case 2 : do nothing
     */
    $case;
    $CI = &get_instance();
    $CI->load->model('sorting_model');
    $user_preference = $CI->sorting_model->get_user_preference($CI->session->userdata('userid'), $page);
    if (!empty($CI->input->post('sort-field'))) {
        $sort_field = $CI->input->post('sort-field');
        $sort_order = $CI->input->post('sort-order');
        $case = 1;
    } else if ($user_preference) {
        $sort_field = $user_preference->sort_field;
        $sort_order = $user_preference->sort_order;
        $case = 2;
    } else {
        $sort_field = $default_field;
        $sort_order = $default_order;
        $case = 0;
    }
    $pref_data = array(
        'sort_field' => $sort_field,
        'sort_order' => $sort_order,
        'page' => $page,
        'user_id' => $CI->session->userdata('userid')
    );
    switch ($case) {
        case 0 :
            $CI->sorting_model->insert_user_preference($pref_data);
            break;
        case 1 :
            $CI->sorting_model->update_user_preference($pref_data, $user_preference->id);
            break;
        case 2 :
            //do nothing
            break;
    }
    return array('sort_field' => $sort_field , 'sort_order' => $sort_order);
}
