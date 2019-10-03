<?php
    class Kategori_Model extends CI_Model {

        public function insert($data) {
            return $this->db->insert('kategori', $data);
        }

        public function get($search=NULL) {
            return ($search == NULL) ? $this->db->get('kategori')->result() : $this->db->get_where('kategori', "kategori LIKE '%$search%'")->result();
        }

        public function update($data) {
            $this->db->set('kategori', $data['kategori']);
            $this->db->where('id', $data['id']);

            return $this->db->update('kategori');
        }

        public function delete($id) {
            $this->db->where('id', $id);

            return $this->db->delete('kategori');
        }

        public function find($id) {
            $this->db->where('id', $id);
            $q = $this->db->get('kategori')->result();
            return (count($q) > 0) ? $q[0] : [];
        }
    }