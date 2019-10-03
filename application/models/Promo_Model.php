<?php
    class Promo_Model extends CI_Model {

        public function insert($data) {
            return $this->db->insert('promo', $data);
        }

        public function get($search=NULL) {
            return ($search == NULL) ? $this->db->get('promo')->result() : $this->db->get_where('promo', "token LIKE '%$search%'")->order_by('expired_date')->result();
        }

        public function delete($id) {
            $this->db->where('id', $id);

            return $this->db->delete('promo');
        }
    }