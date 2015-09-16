<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Api extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->library('parser');
        $this->load->helper('cookie');
        $this->load->helper('text');  
        $this->load->helper(array('form', 'url')); 
    }
    // area admin
    public function memberAdd(){
        
    }
    public function memberList(){
        
    }
    // end admin
    // public user
    
    public function userProfile(){
        
    }
    public function userHistory(){
        
    }
    public function addCard(){
        
    }
}
