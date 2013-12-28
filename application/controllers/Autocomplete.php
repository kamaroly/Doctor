<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autocomplete
 *
 * @author dell
 */
//if (!defined('BASEPATH'))
//    exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
        $this->load->model('Patient');
        //$this->load->helper('url');
        $this->load->library('grocery_CRUD');
    }

    function index() {
        $this->load->view('login/login_view');
    }

    function suggestions() {
        //$email = trim($this->input->get('term', TRUE));
        $this->load->model('autocomplete_model');
	$term = trim($this->input->post('term', TRUE));
        $rows = $this->autocomplete_model->GetAutocomplete(array('keyword' => $term));
        $json_array = array();
        foreach ($rows as $row)
            array_push($json_array, $row->email);

        echo json_encode($json_array);
    }
}

?>