<?php
    class Transaksi_Model extends CI_Model {

        public function insert($data) {
            return $this->db->insert('transaksi', $data);
        }        

        public function insert_detail($data) {
            return $this->db->insert('detail_transaksi', $data);
        }
        
        public function delete_detail($id) {
            $this->db->where('id', $id);
            return $this->db->delete('detail_transaksi');
        }

        public function getHistories($user_id)
        {
            $this->db->where('user_id', $user_id);
            $this->db->limit(5);
            $this->db->order_by('id', 'desc');
            return $this->db->get('transaksi')->result();
        }

        public function getHistoriesAll($user_id)
        {
            $this->db->where('user_id', $user_id);            
            return $this->db->get('transaksi')->result();
        }

        public function getHistoriesAllResi($user_id)
        {
            $this->db->where('user_id', $user_id);            
            return $this->db->get('transaksi_resi')->result();
        }

        public function find($id)
        {
            $this->db->where('id', $id);
            return $this->db->get('transaksi_resi')->row_array();
        }

        public function findTransaksi($id)
        {
            $this->db->where('transaksi_id', $id);
            return $this->db->get('barang_transaksi')->result();
        }

        public function getTransaction($cond = "default")
        {
            $data = $this->db;

            if(!$cond == "default") {
                
                if($cond == "order_status") {
                    $data = $data->order_by('status', 'asc');
                }

            }

            $data = $data->get('transaksi');

            return $data->result();
        }

        public function delete($id) {
            $this->db->where('id', $id);

            return $this->db->delete('transaksi');
        }
    }