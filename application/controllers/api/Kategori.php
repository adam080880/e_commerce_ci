<?php
    defined('BASEPATH') OR exit('no script allowed');

    class Kategori extends CI_Controller {

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

            $this->load->model('Kategori_Model');
        }

        public function post()
        {
            $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[kategori.kategori]');

            $res = [];

            if(!$this->form_validation->run()) {

                $res = [
                    'data' => [
                        'kategori' => form_error('kategori')
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                
                $data = [
                    'kategori' => $this->input->post('kategori')
                ];

                $query = $this->Kategori_Model->insert($data);
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

        public function get() 
        {
            $data = $this->Kategori_Model->get();

            echo json_encode($data); exit;
        }

        public function put()
        {
            $this->form_validation->set_rules('id', 'ID', 'required|trim');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[kategori.kategori]');

            $res = [];

            if(!$this->form_validation->run()) {

                $res = [
                    'data' => [
                        'kategori' => form_error('kategori'),                        
                    ],
                    'res' => false,
                    'status' => false
                ];

            }  else {

                $data = [
                    'kategori' => $this->input->post('kategori'),        
                    'id' => $this->input->post('id')            
                ];

                $query = $this->Kategori_Model->update($data);

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

        public function delete($id)
        {
            $query = $this->Kategori_Model->delete($id);

            if(!$query) {
                $res = [
                    'data' => [
                        'id' => $id
                    ],
                    'res' => $query,
                    'status' => false
                ];
            } else {
                $res = [
                    'data' => [
                        'id' => $id
                    ],
                    'res' => $query,
                    'status' => true
                ];
            }

            echo json_encode($res); exit;
        }

        public function find($id) {
            $query = $this->Kategori_Model->find($id);

            if(!$query) {
                $res = [
                    'data' => [
                        
                    ],
                    'res' => $query,
                    'status' => false
                ];
            } else {
                $res = [
                    'data' => [
                        $query
                    ],
                    'res' => $query,
                    'status' => true
                ];
            }

            echo json_encode($res); exit;
        }

    }