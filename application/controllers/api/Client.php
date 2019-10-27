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

        public function province()
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1a29bdb21a8c7173ee70da9d11b7fae1"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo json_encode("cURL Error #:" . $err);
            } else {
            echo $response;
            }
        }

        public function city($province_id)
        {            

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1a29bdb21a8c7173ee70da9d11b7fae1"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
        }

        public function city_id($city_id)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$city_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1a29bdb21a8c7173ee70da9d11b7fae1"
            ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
            echo "cURL Error #:" . $err;
            } else {
            echo $response;
            }
        }
        
        public function addProfile()
        {
            $user_id = $this->user_data->id;

            echo json_encode( $this->Users_Model->alamatCreate([
                'user_id' => $user_id,
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota_kab' => $this->input->post('kota_kab'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kode_pos' => $this->input->post('kode_pos'),
                'province_ro_id' => $this->input->post('province_ro_id'),
                'kabupaten_or_id' => $this->input->post('kabupaten_or_id'),
                'nama' => $this->input->post('nama')
            ]) );

        }

        public function alamat()
        {
            $user_id = $this->user_data->id;

            $this->db->where('user_id', $user_id);
            echo json_encode($this->db->get('alamat_profile')->result());exit;
        }

        public function alamat_id($id)
        {
            $user_id = $this->user_data->id;
            $this->db->where('user_id', $user_id);
            $this->db->where('id', $id);
            echo json_encode($this->db->get('alamat_profile')->result()[0]);exit;
        }

        public function editProfile()
        {            
            echo json_encode($this->Users_Model->alamatUpdate([
                'alamat' => $this->input->post('alamat'),
                'provinsi' => $this->input->post('provinsi'),
                'kota_kab' => $this->input->post('kota_kab'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kelurahan' => $this->input->post('kelurahan'),
                'kode_pos' => $this->input->post('kode_pos'),
                'province_ro_id' => $this->input->post('province_ro_id'),
                'kabupaten_or_id' => $this->input->post('kabupaten_or_id'),
                'nama' => $this->input->post('nama')
            ], $this->input->post('id')));exit;

        }

        public function deleteAlamat($id)
        {
            $this->db->where('id', $id);
            $this->db->where('user_id', $this->user_data->id);
            echo json_encode($this->db->delete('alamat_profile'));exit;
        }
    }
?>
