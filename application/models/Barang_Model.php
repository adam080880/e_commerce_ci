<?php
    class Barang_Model extends CI_Model {

        public function insert($data) {
            return $this->db->insert('barang', $data);
        }

        public function get($search=NULL) {
            return ($search == NULL) ? $this->db->get('barang')->result() : $this->db->get_where('barang', "nama LIKE '%$search%'")->result();
        }

        public function getOrderByHarga() {
            return $this->db->order_by('harga')->get('barang', 5)->result();
        }

        public function getBarangLimit15() {
            return $this->db->order_by('created_at', 'desc')->get('barang', 15)->result();
        }

        public function find($id) {
            $this->db->where('id', $id);
            return $this->db->get('barang')->result();
        }

        public function getByCat($kategori_id) {
            return $this->db->get_where('barang', "kategori_id='$kategori_id'")->result();
        }

        public function update($data) {
            $this->db->set('nama', $data['nama']);   
            $this->db->set('tipe', $data['tipe']);
            $this->db->set('size', $data['size']);
            $this->db->set('harga', $data['harga']);
            $this->db->set('kategori_id', $data['kategori_id']);            
            $this->db->set('stok', $data['stok']);
            if(isset($data['image_url'])) $this->db->set('image_url', $data['image_url']);
            $this->db->where('id', $data['id']);

            return $this->db->update('barang');
        }

        public function delete($id) {
            $this->db->where('id', $id);

            return $this->db->delete('barang');
        }
    }