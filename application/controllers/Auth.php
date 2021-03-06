<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsersModel"); //load model mahasiswa
        $this->load->database();
    }
    public function regist()
    {
        $User = $this->UsersModel; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($User->rules()); //menerapkan rules validasi pada UsersModel
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada UsersModel
        if ($validation->run()) {
            $User->regist();
            redirect("/");
        } else {
            echo "gagal";
        }
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->query("SELECT * FROM users WHERE email = '$email'")->row();
        if ($user) {
            $this->UsersModel->login($password, $user);
        } else {
            echo "Email salah";
        }
        // var_dump($user->password);
    }
    public function logout()
    {
        session_destroy();
        redirect("/");
    }
}
