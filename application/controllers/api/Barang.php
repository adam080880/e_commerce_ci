<?php
    defined('BASEPATH') or exit("no script allowed");

    class Barang extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            header("Content-Type: Application/json");
            $this->load->model('Users_Model');

            if(!isset($_GET['token'])) {
                echo json_encode([
                    'message' => 'Token is required'
                ]); exit;
            } else {
                
                $valid = $this->Users_Model->valid_token($_GET['token']);
                if(!$valid) {
                    echo json_encode([
                        'message' => 'Token is not valid'
                    ]); exit;
                }

                if($valid->role == 'customer' || $valid->verified == NULL) {
                    echo json_encode([
                        'message' => 'Role anda tak memenuhi syarat'
                    ]); exit;
                }

            }

            $this->load->model('Barang_Model');
        }

        public function get() {
            $data = $this->Barang_Model->get();

            echo json_encode($data); exit;
        }

        public function find($id) {
            $data = $this->Barang_Model->find($id);

            echo json_encode($data); exit;
        }

        public function getByCat($id) {
            $data = $this->Barang_Model->getByCat($id);

            echo json_encode($data); exit;
        }

        public function delete($id) {
            $data = $this->Barang_Model->delete($id);

            echo json_encode($data); exit;
        }

        public function post() {
            
            $this->form_validation->set_rules('nama', 'Name', 'required|trim');
            $this->form_validation->set_rules('tipe', 'Type', 'required|trim');
            $this->form_validation->set_rules('size', 'Size', 'required|trim');
            $this->form_validation->set_rules('harga', 'Price', 'required|trim');
            $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
            $this->form_validation->set_rules('kategori_id', 'Category', 'required|trim');

            $res = [];

            if(!$this->form_validation->run()) {

                $res = [
                    'data' => [
                        'nama' => form_error('nama'),
                        'tipe' => form_error('tipe'),
                        'size' => form_error('size'),
                        'harga' => form_error('harga'),
                        'stok' => form_error('stok'),
                        'kategori_id' => form_error('kategori_id'),
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                
                $data = [
                    'nama' => $this->input->post('nama'),
                    'tipe' => $this->input->post('tipe'),
                    'size' => $this->input->post('size'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'kategori_id' => $this->input->post('kategori_id'),                    
                ];

                $query = $this->Barang_Model->insert($data);
                if(!$query) {
                    $res = [
                        'data' => $data,
                        'res' => $query,
                        'status' => false
                    ];
                } else {
                    $res = [
                        'data' => $data,
                        'res' => $query,
                        'status' => true
                    ];
                }
            }

            echo json_encode($res);
            exit;

        }

        public function put() {
            
            $this->form_validation->set_rules('id', 'ID', 'required|trim');
            $this->form_validation->set_rules('nama', 'Name', 'required|trim');
            $this->form_validation->set_rules('tipe', 'Type', 'required|trim');
            $this->form_validation->set_rules('size', 'Size', 'required|trim');
            $this->form_validation->set_rules('harga', 'Price', 'required|trim');
            $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
            $this->form_validation->set_rules('kategori_id', 'Category', 'required|trim');

            $res = [];

            if(!$this->form_validation->run()) {

                $res = [
                    'data' => [
                        'id' => form_error('id'),
                        'nama' => form_error('nama'),
                        'tipe' => form_error('tipe'),
                        'size' => form_error('size'),
                        'harga' => form_error('harga'),
                        'stok' => form_error('stok'),
                        'kategori_id' => form_error('kategori_id'),
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                
                $data = [
                    'id' => $this->input->post('id'),
                    'nama' => $this->input->post('nama'),
                    'tipe' => $this->input->post('tipe'),
                    'size' => $this->input->post('size'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'kategori_id' => $this->input->post('kategori_id'),                    
                ];

                $query = $this->Barang_Model->update($data);
                if(!$query) {
                    $res = [
                        'data' => $data,
                        'res' => $query,
                        'status' => false
                    ];
                } else {
                    $res = [
                        'data' => $data,
                        'res' => $query,
                        'status' => true
                    ];
                }
            }

            echo json_encode($res);
            exit;

        }

    }