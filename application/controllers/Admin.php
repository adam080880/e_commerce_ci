<?php
    class Admin extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
        }

        public function index() {
            $this->load->view('admin/layout/header_theme', [
                'title' => 'Utama'
            ]);
            $this->load->view('admin/layout/sidebar_theme');

            $this->load->view('admin/index');

            $this->load->view('admin/layout/footer_theme', [
                'java' => [
                    "http://" . $_SERVER['HTTP_HOST'] . '/assets/page/admin.js',
                    "http://" . $_SERVER['HTTP_HOST'] . '/assets/page/kate.js',
                ]
            ]);
        }

        public function login() {
            $this->load->view('admin/login');
        }

        public function register() {
            $this->load->view('admin/register');
        }

        public function barang() {
            $this->load->view('admin/layout/header_theme', [
                'title' => 'Barang'
            ]);
            $this->load->view('admin/layout/sidebar_theme');

            $this->load->view('admin/barang');

            $this->load->view('admin/layout/footer_theme', [
                'java' => [
                    base_url() . 'assets/page/barang.js'
                ]
            ]);
        }

        public function promo() {
            $this->load->view('admin/layout/header_theme', [
                'title' => 'Promo'
            ]);
            $this->load->view('admin/layout/sidebar_theme');

            $this->load->view('admin/promo');

            $this->load->view('admin/layout/footer_theme', [
                'java' => [
                    base_url() . 'assets/page/promo.js'
                ]
            ]);
        }

        public function users() {
            $this->load->view('admin/layout/header_theme', [
                'title' => 'Users'
            ]);
            $this->load->view('admin/layout/sidebar_theme');

            $this->load->view('admin/users');

            $this->load->view('admin/layout/footer_theme', [
                'java' => [
                    base_url() . 'assets/page/users.js'
                ]
            ]);
        }

        public function riwayat() {
            $this->load->view('admin/layout/header_theme', [
                'title' => 'Riwayat Transaksi'
            ]);
            $this->load->view('admin/layout/sidebar_theme');

            $this->load->view('admin/riwayat');

            $this->load->view('admin/layout/footer_theme', [
                'java' => [
                    base_url() . 'assets/page/riwayat.js'
                ]
            ]);
        }

    }