<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Follow extends CI_Controller
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
    public function follow($following)
    {
        $user = $this->session->userdata('id');
        $this->db->query("INSERT INTO follows(follower_id,following_id) VALUES ('$user','$following')");
        return redirect('/');
    }

    public function unfollow($id)
    {
        $this->db->query("DELETE FROM follows WHERE id='$id'");
        return redirect('/');
    }
}
