<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Member extends CI_Controller {

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
        $this->load->model('user_model');
        if($this->session->userdata('admin_type') == null) redirect ('/');
        if($this->session->userdata('admin_type') == 1) redirect ('admin/user');
    }
    public function index(){

         $this->load->view('admincp/index');
    }
     public function history(){
         $this->load->view('admincp/index');
         //        $page = $this->input->get('page');
//        if($page =="") $page=0;
//        else $page=(int)$page;
////        echo $page;
//        $number_user = $this->user_model->get_number_user();
//         $limit = 2;
//        $data['total'] = $number_user;
//        if($number_user%$limit ==0)  $data['number_page'] = (int)($number_user/$limit);
//        else  $data['number_page'] = (int)($number_user/$limit)+1;
//        $data['cur_page'] = $page;
//        $list_user = $this->user_model->get_user_page($page*$limit,$limit);
//        $data['list_user'] = $list_user;
     }
}
