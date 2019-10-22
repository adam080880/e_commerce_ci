<?php
    defined('BASEPATH') or exit("no script allowed");

    class Client extends CI_Controller {

        private $user_data;
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

                if($valid->role == 'admin') {
                    echo json_encode([
                        'message' => 'Role anda tak memenuhi syarat'
                    ]); exit;
                }

                $this->user_data = $valid;

            }

            $this->load->model('Cart_Model');
        }

        public function getCart()
        {
            echo json_encode($this->Cart_Model->getUser($this->user_data->id));exit;
        }

        public function addToCart()
        {            
            $data = [
                'user_id' => $this->user_data->id,
                'barang_id' => $this->input->post('barang_id'),
                'total' => $this->input->post('total')
            ];

            $this->db->where('barang_id', $this->input->post('barang_id'));
            $this->db->where('user_id', $this->user_data->id);
            
            while(true) {
                $res = $this->db->get('cart')->result();

                if(count($res) > 0) {
                    $stok = $res[0]->total + $this->input->post('total');

                    $this->db->where('id', $res[0]->id);                    
                    if($this->db->update('cart', [
                        'total' => $stok
                    ])) {
                        $json = [
                            'data' => $data,
                            'status' => true
                        ];                  
                        break;      
                    } else {
                        $json = [
                            'data' => $data,
                            'status' => false
                        ];    
                        break;                    
                    }
                }
                $res = $this->Cart_Model->addToCart($data);                                                 

                if($res) {
                    $json = [
                        'data' => $data,
                        'status' => true
                    ];
                } else {
                    $json = [
                        'data' => $data,
                        'status' => false
                    ];
                }

                break;
            }
            echo json_encode($json); exit;
        }        

        public function deleteCart($id)
        {
            $check = $this->db->get_where('cart', [
                'id' => $id
            ])->result();

            $json = [];
            while(true) {
                if($check[0]->user_id != $this->user_data->id) {
                    $json = [
                        'data' => [
                            'id' => $id
                        ],
                        'status' => false
                    ];
                    break;
                }

                $this->db->where('id', $id);
                if($this->db->delete('cart')) {
                    $json = [
                        'data' => [
                            'id' => $id
                        ],
                        'status' => true
                    ];
                } else {
                    $json = [
                        'data' => [
                            'id' => $id
                        ],
                        'status' => false
                    ];
                }
                break;
            }

            echo json_encode($json);exit;
        }

    }
?>
