<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Users extends CI_Controller {        

        public function __construct()
        {
            parent::__construct();
            header("Content-Type: Application/json");

            $this->load->model("Users_Model");
        }

        public function register()
        {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
            
            $res = [];

            if(!$this->form_validation->run()) {
                
                $res = [
                    'data' => [
                        'username' => form_error('username'),
                        'password' => form_error('password'),
                        'email' => form_error('email'),
                        'role' => 'admin'
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'role' => 'admin',
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),                   
                ];  
                $data['token'] = password_hash($data['username'], PASSWORD_DEFAULT);                            
    
                $query = $this->Users_Model->register($data);
    
                if (!$query) {
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

        public function register_client()
        {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
            
            $res = [];

            if(!$this->form_validation->run()) {
                
                $res = [
                    'data' => [
                        'username' => form_error('username'),
                        'password' => form_error('password'),
                        'email' => form_error('email'),
                        'role' => 'customer'
                    ],
                    'res' => false,
                    'status' => false
                ];

            } else {
                $data = [
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'role' => 'customer',
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),                   
                ];  
                $data['token'] = password_hash($data['username'], PASSWORD_DEFAULT);                            
    
                $query = $this->Users_Model->register($data);
    
                if (!$query) {
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

        public function login() 
        {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];

            $res = [];

            $query = $this->Users_Model->login($data);

            if(!$query) {
                $res = [                    
                    'data' => $data,                    
                    'message' => 'failed',
                    'status' => false
                ];
            } else {

                if(password_verify($data['password'], $query[0]->password)) {
                    
                    $data['token'] = $this->Users_Model->get_token($query[0]->token);

                    $res = [                    
                        'data' => [
                            'token' => $data['token'],
                            'role' => $query[0]->role,
                            'verified' => $query[0]->verified
                        ],
                        'message' => 'success',
                        'status' => true
                    ];
                } else {
                    $res = [                    
                        'data' => $data,                        
                        'message' => 'failed',
                        'status' => false
                    ];
                }

            }

            echo json_encode($res);
            exit;
        }

        public function get()
        {
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

            $data = $this->Users_Model->get();

            echo json_encode($data); exit;
        }

        public function checked($id)
        {
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

            echo json_encode([
                'status' => $this->Users_Model->checked($id)
            ]); exit;

        }

    }
    