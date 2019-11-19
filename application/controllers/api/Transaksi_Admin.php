<?php
    defined('BASEPATH') or exit("no script allowed");

    class Transaksi_Admin extends CI_Controller
    {
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

            $this->load->model('Transaksi_Model');
        }

        public function get()
        {
            echo json_encode($this->Transaksi_Model->transaksi__()); exit;
        }

        public function changeToVerified($id)
        {
            $this->db->set('status', 'verified');
            $this->db->where('id', $id);
            echo json_encode($this->db->update('transaksi')); exit;
        }
    }