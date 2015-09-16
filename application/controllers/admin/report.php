<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');  
        $this->load->helper(array('form', 'url')); 
        @session_start();
        if($this->session->userdata('admin_type') !=1) redirect ('/');
    }
    public function index(){
        $this->load->view('admincp/index');
    }
     

}
