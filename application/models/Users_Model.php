<?php

    class Users_Model extends CI_Model {

        public function get()
        {
            $this->db->from('users');
            $this->db->order_by('role');
            $this->db->order_by('verified', 'desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function register($data) {
            return $this->db->insert('users', $data);
        }

        public function get_token($token) {
            $res = $this->db->get_where('users', "token='$token'")->result();

            $new_token = password_hash($res[0]->token, PASSWORD_DEFAULT);

            $this->db->set('token', $new_token);
            $this->db->where('token', $res[0]->token);
            
            $query = $this->db->update('users');

            if($query) {
                return $new_token;
            } else {
                return $token;
            }
        }

        public function valid_token($token) {
            $res = $this->db->get_where('users', "token='$token'")->result();

            if(count($res) > 0) {
                return $res[0];
            }

            return false;
        }

        public function login($data) {
            $username = $data['username'];
            return $this->db->get_where('users', "username='$username'")->result();
        }        

        public function checked($id)
        {
            $this->db->where('id', $id);
            $query = $this->db->get('users')->result()[0];

            $verified = ($query->verified == null) ? "verified_admin" : "null";

            $this->db->set('verified', $verified);
            $this->db->where('id', $id);

            return $this->db->update('users');
        }

    }