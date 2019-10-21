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

    }
?>