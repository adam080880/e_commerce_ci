<?php

    class Config extends CI_Model {

        public function get()
        {
            return $this->db->get("config")->result();
        }

        public function insert(array $i) {
            
        }

    }