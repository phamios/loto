<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class admincp extends CI_Controller {

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
    }

    function index() {
        $this->load->view('admincp/index.php');
        // if ($this->session->userdata('admin_id') == null) {
        //     redirect('admincp/login');
        // } else {
        //     $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
        //     $data['list_menu'] = $this->modules_model->list_all_active();
        //     $this->load->view('admincp/dashboard', $data);
        // }
    }

    

    function login() {
        if ($this->session->userdata('admin_id') == null) {
            if (isset($_REQUEST['go'])) {
                $username = $this->input->post('email', true);
                $password = $this->input->post('password', true);
                $this->load->model('user_model');
                $result = $this->user_model->authen($username, $password);
                if (empty($result)) {
                    redirect('admincp/login');
                } else {
                    $session_user = array(
                        'admin_id' => $result['user_id'],
                        'admin_name' => $result['user_name'],
                        'admin_type' => $result['user_type'],
                        'admin_active' => $result['user_active'],
                    );
                    $this->session->set_userdata($session_user);
                    redirect('admincp/index');
                }
            }
            $this->load->view('admincp/login');
        } else {
            redirect('admincp/index');
        }
    }

    function logout() {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_name');
        $this->session->unset_userdata('admin_type');
        $this->session->unset_userdata('admin_active');
        redirect('admincp/login');
    }

    function register() {
        if ($this->session->userdata('admin_id') == null) {
            if (isset($_REQUEST['go'])) {
                $username = $this->input->post('email', true);
                $password = $this->input->post('password', true);
                $repeatpass = $this->input->post('password_rep', true);
                if ($password <> $repeatpass) {
                    redirect('admincp/register/error_repeat_password');
                } else {
                    $active = 0;
                    $type = 1;
                    $this->load->model('user_model');
                    $params = array(
                        'username' => $username,
                        'password' => $password,
                        'active' => $active,
                        'usertype' => $type,
                    );
                    $result = $this->user_model->insert($params);
                    if ($result <> null) {
                        redirect('admincp/login');
                    } else {
                        redirect('admincp/register/error');
                    }
                }
            }
            if (isset($_REQUEST['go_login'])) {
                redirect('admincp/login');
            }
            $this->load->view('admincp/register');
        } else {
            $this->load->view('admincp/dashboard');
        }
    }
    
     

}
