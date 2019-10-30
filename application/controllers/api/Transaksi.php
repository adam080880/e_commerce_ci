<?php
    class Transaksi extends CI_Controller
    {
        private $user = 1;

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

                if($valid->role != 'customer' && $valid->verified == "verified_admin") {
                    echo json_encode([
                        'message' => 'Role anda tak memenuhi syarat'
                    ]); exit;
                }

                $this->user = $valid;

                $this->load->model('Transaksi_Model');

            }
        }

        public function histories()
        {
            $data = $this->Transaksi_Model->getHistories($this->user->id);
            return json_encode([
                'datas' => $data,
                'errors' => null
            ]);
        }

        public function pengiriman()
        {
            $data = [
                'no_resi' => $this->input->post('no_resi'),
                'kirim' => $this->input->post('kirim'),
                'terima' => $this->input->post('terima'),
                'biaya' => $this->input->post('biaya'),
                'alamat_id' => $this->input->post('alamat_id'),
            ];
            
            $res = $this->Transaksi_Model->inputKirim($data);

            if(!$res) {
                return json_encode([
                    'data' => $res,
                    'status' => false
                ]);
            } else {
                return json_encode([
                    'data' => $res,
                    'status' => false
                ]);
            }
        }

        public function init_transaksi()
        {
            $data = $this->Transaksi_Model->insert([
                'user_id' => $this->user->id,
                'pengiriman_id' => NULL,
                'status' => 'unverified',
                'total' => 0        
            ]);

            return json_encode([
                'datas' => $data                
            ]);
        }

        public function beli()
        {
            $data = [
                'barang_id' => $this->input->post('barang_id'),
                'transaksi_id' => $this->input->post('transaksi_id'),
                'amount' => $this->input->post('amount')
            ];

            if( $data = $this->Transaksi_Model->insert_detail($data) ) {
                return json_encode([
                    'data' => $data,
                    'status' => true
                ]);
            } else {
                return json_encode([
                    'data' => $data,
                    'status' => false
                ]);
            }
        }
    }