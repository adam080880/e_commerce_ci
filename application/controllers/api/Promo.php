<?php
    defined('BASEPATH') OR exit('no direct script allowed');

    class Promo extends CI_Controller {

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

            $this->load->model('Promo_Model');
        }

        public function post()
        {
            $this->form_validation->set_rules('token', 'TOKEN', 'required|trim|is_unique[promo.token]');            
            $this->form_validation->set_rules('diskon', 'DISCOUNT', 'required|trim|decimal');
            $this->form_validation->set_rules('expired_date', 'EXPIRED', 'required|trim');

            $res = [];

            if(!$this->form_validation->run()) {

                $res = [
                    'data' => [
                        'token' => form_error('token')
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                    
                $data = [
                    'token' => $this->input->post('token'),                    
                    'diskon' => $this->input->post('diskon'),
                    'expired_date' => $this->input->post('expired_date')
                ];

                $query = $this->Promo_Model->insert($data);
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
            $data = $this->Promo_Model->get();

            echo json_encode($data); exit;
        }

        public function delete($id)
        {
            $query = $this->Promo_Model->delete($id);

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

    }