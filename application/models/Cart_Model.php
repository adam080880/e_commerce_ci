<?php
    class Cart_Model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }
        
        public function getUser($id)
        {
            $data = $this->db->get_where('cart_barang', [
                'user_id' => $id
            ]);

            return $data->result();
        }

        public function addToCart($data)
        {
            return $this->db->insert('cart', $data);
        }

    }