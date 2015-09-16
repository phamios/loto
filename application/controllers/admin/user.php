<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class User extends CI_Controller {

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
        if($this->session->userdata('admin_type') !=1) redirect ('/member');
    }
    public function index(){
        $page = $this->input->get('page');
        if($page =="") $page=0;
        else $page=(int)$page;
//        echo $page;
        $number_user = $this->user_model->get_number_user();
         $limit = 2;
        $data['total'] = $number_user;
        if($number_user%$limit ==0)  $data['number_page'] = (int)($number_user/$limit);
        else  $data['number_page'] = (int)($number_user/$limit)+1;
        $data['cur_page'] = $page;
        $list_user = $this->user_model->get_user_page($page*$limit,$limit);
        $data['list_user'] = $list_user;
        $this->load->view('admincp/index',$data);
    }
     
    public function add(){
        $this->load->view('admincp/index');
    }
    
    
    
    
    
    public function createuser(){
        $username= $this->input->post('username');
        $pass = $this->input->post('password');
        $repeat = $this->input->post('repeat');
        if($username!=null && $pass !=null){
            $this->user_model->create_user(array("username"=>$username,"userpass"=>  md5($pass),'status'=>3));
             redirect ('admin/user');
        }
        else   redirect ('admin/user/add');
        
    }
    public function ajaxcheck(){
            $action = $this->input->post('action');
            $username = $this->input->post('username');
            if($action=="username"){
                $user = $this->user_model->check_exit($username);
                if($user == false){
                        $responce= array("status"=>false,"message"=>"something wrong");
                }else{
                    $responce= array("status"=>true,"message"=>"something wrong");
                }
            }else{
                $responce= array("status"=>false,"message"=>"something wrong");
            }
             $this->output->set_output(json_encode($responce));
    }
}
