<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function list_all() {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }



    function get_profile($id) {
        $this->db->where('id', $id);
        $this->load->database();
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function authen($username, $password) {
        $this->db->where(array(
            'username' => trim($username),
            'userimei' => md5('+-*%vietgit' . $password),
        ));
        echo md5('+-*%vietgit' . $password); die;
        $query = $this->db->get('tbl_users');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $result = array(
                    'user_id' => $value->id,
                    'user_name' => $value->uname,
                    'user_type' => $value->utype,
                    'user_active' => $value->uactive
                );
                return $result;
            }
        } else {
            return null;
        }
    }

    function check_exit($username) {
        $this->db->where(array(
            'uname' => $username,
        ));
        $query = $this->db->get("tbl_users");
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    /*
     * Praram Array to insert
     */

    function insert($values) {
        if ($this->check_exit($values['username'])) {
            $data = array(
                'uname' => $values['username'],
                'upass' => md5($this->config->item('key') . '+-*%' . $values['password']),
                'uactive' => $values['active'],
                'utype' => $values['usertype'],
                'udate' => date("Y-m-d h:s:m"),
                'uemail' => $values['email'],
                'uphone' => $values['phone'],
                'uaddress' => $values['address'],
            );
            $this->db->insert('tbl_users', $data);
            return $this->get_id($values['username']);
        } else {
            return null;
        }
    }

    function update($values) {
        $data = array(
            'uname' => $values['username'],
//                'upass' => md5($this->config->item('key') . '+-*%' . $values['password']),
            'uactive' => $values['active'],
            'utype' => $values['usertype'],
            'uemail' => $values['email'],
            'uphone' => $values['phone'],
            'uaddress' => $values['address'],
        ); 
        $this->db->where('id', $values['id']);
        $this->db->update('tbl_users', $data);
    }

    function get_id($username) {
        $this->db->where(array(
            'uname' => $username,
        ));
        $query = $this->db->get("tbl_users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $values) {
                return $values->id;
            }
        } else {
            return 0;
        }
    }

    function update_password($userid, $newpass) {
        $data = array(
            'upass' => md5($this->config->item('key') . '+-*%' . $newpass),
        );
        $this->db->where('id', $userid);
        $this->db->update('tbl_users', $data);
    }

    function delete($id) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->delete('tbl_users');
    }

}
