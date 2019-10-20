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

                if($valid->role == 'admin' || $valid->verified == NULL) {
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
    }