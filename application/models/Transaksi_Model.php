<?php
    class Transaksi_Model extends CI_Model {

        public function insert($data) {
            return $this->db->insert('barang', $data);
        }

        public function get($search=NULL) {
            return ($search == NULL) ? $this->db->get('barang')->result() : $this->db->get_where('barang', "nama LIKE '%$search%'")->result();
        }

        public function delete($id) {
            $this->db->where('id', $id);

            return $this->db->delete('barang');
        }
    }