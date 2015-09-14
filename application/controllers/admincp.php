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
        $lang = $this->config->item('language_site');
        $this->load->model('modules_model');
        $this->lang->load($lang, $lang);
        $this->load->helper(array('form', 'url'));
        $this->load->model('log_model');
        $this->load->model('config_model');
        @session_start();
    }

    function index() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function giftcard() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->model('gift_model');
            $data['list_gift'] = $this->gift_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }
    
    function orderdetails($id=null){
         if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->model('gift_model'); 
            $data['list_gift_details'] = $this->gift_model->list_details($id);
            $this->load->model('user_model');
            $this->load->model('product/product_model');
            $data['list_product'] = $this->product_model->list_all();
            $data['list_user'] = $this->user_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
    }
    
    function deletegift($id=null){
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('gift_model');
            $this->gift_model->delete($id);
            redirect('admincp/giftcard');
        }
    }

    function configsite() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            if (isset($_REQUEST['btt_submit'])) {
                $array['sitename'] = $this->input->post('sitename', true);
                $array['meta_author'] = $this->input->post('meta_author', true);
                $array['meta_des'] = $this->input->post('meta_des', true);
                $array['meta_keyword'] = $this->input->post('meta_keyword', true);
                $array['address1'] = $this->input->post('address1', true);
                $array['address2'] = $this->input->post('address2', true);
                $array['phone1'] = $this->input->post('phone1', true);
                $array['phone2'] = $this->input->post('phone2', true);
                $array['codeanalytic'] = $this->input->post('codeanalytic', true);
                $this->load->model('config_model');
                $this->config_model->updateconfig($array);
                redirect('admincp/configsite');
            }
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function configslide() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('product/product_model');
            if (isset($_REQUEST['btt_submit'])) {
                $imageid = $this->input->post('file_image');
                $count = count($this->input->post('file_image'));
                for ($i = 0; $i < $count; $i++) {
                    $this->product_model->updateslide($imageid[$i]);
                }
                redirect('admincp/configslide');
            }
            $data['list_slide'] = $this->product_model->list_slide();
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function deleteslide($id = null) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('image_model');
            $this->image_model->delete_image($id);
            redirect('admincp/configslide');
        }
    }
    
    function updatepass($nof = null){
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('user_model');
            $userid = $this->session->userdata('admin_id');
            $this->load->model('product/product_model');
            if (isset($_REQUEST['btt_submitedit'])) {
                $newpass = $this->input->post('yourpassword',true);  
                $this->user_model->update_password($userid,$newpass);
                redirect('admincp/updatepass/1');
            }
            if($nof == 1){
                $data['notify'] = "Updated new Password !";
            } else {
                $data['notify'] = "";
            }
            $data['id'] = $userid;
            $data['profile'] = $this->user_model->get_profile($this->session->userdata('admin_id'));
            $data['list_config'] = $this->config_model->list_all();
            $data['list_menu'] = $this->modules_model->list_all_active();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    public function uploadimage() {
        if (0 < $_FILES['file']['error']) {
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            if ($_FILES['file']['name'] != null) {
                move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . time() . '_' . $_FILES['file']['name']);
                $file = time() . '_' . $_FILES['file']['name'];
                $this->load->model('product/product_model');
                $image_id = $this->product_model->insert_image($file, null);

                echo "<input type='hidden' value='" . $image_id . "' name='file_image[]' />";
                echo "<img src='" . base_url('uploads') . '/' . $file . "' width='10%' alt='image' />";
                die;
            }
        }
    }

    function menu() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_navigator'] = $this->modules_model->list_front();
            $this->load->view('admincp/dashboard', $data);
        }
    }

    function menu_update_order($id, $order) {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->modules_model->status_order($id, $order);
            return "OK ";
        }
    }

    function modules() {
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            $this->load->view('admincp/dashboard', $data);
        }
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
    
    
    function catenews($id=null){
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('catenews_model');
            $this->log_model->log($this->session->userdata('admin_id'), $this->router->class . '-' . $this->router->method);
            $data['list_menu'] = $this->modules_model->list_all_active();
            $data['list_modules'] = $this->modules_model->list_all();
            $data['list_catenews'] = $this->catenews_model->list_all(); 
            if (isset($_REQUEST['btt_submit'])) {
                $name = $this->input->post('catename',true);
                $active = $this->input->post('active',true);
                $this->catenews_model->insert($name, 0, $active) ;
                redirect('admincp/catenews');
            }
            if (isset($_REQUEST['btt_submitedit'])) {
                $name = $this->input->post('catename',true);
                $active = $this->input->post('active',true);
                $this->catenews_model->update($id, $name, 0, $active);
                redirect('admincp/catenews');
            }
            if($id<>null){
                $data['id'] = $id;
                $data['catedetails'] = $this->catenews_model->details($id);
                 
            } 
            $this->load->view('admincp/dashboard', $data);
            
        }
    }
    
    function del_catenews($id=null){
        if ($this->session->userdata('admin_id') == null) {
            redirect('admincp/login');
        } else {
            $this->load->model('catenews_model');
            $this->catenews_model->delete($id);
            redirect('admincp/catenews');
        }
    }

}
