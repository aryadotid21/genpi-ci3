<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    protected $table = "users";
    protected $primaryKey = "email";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'password', 'name', 'alamat', 'foto'];
    //Validasi Form
    public function rules()
    {
        return [
            [
                'field' => 'name',  //samakan dengan atribute name pada tags input
                'label' => 'name',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required|min_length[4]|max_length[100]' //rules validasi
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|is_unique[users.email]'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'trim|required|min_length[4]|max_length[50]'
            ],
            [
                'field' => 'alamat',  //samakan dengan atribute name pada tags input
                'label' => 'alamat',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required|min_length[4]|max_length[100]' //rules validasi
            ]
        ];
    }

    public function getById($id)
    {
        // return $this->db->get_where($this->table, ["id" => $id])->row();
        return $this->db->query("SELECT * FROM users WHERE id = $id")->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }
    public function getAll()
    {
        $id = $this->session->userdata('id');
        if ($id) {
            return $this->db->query("SELECT * FROM users WHERE NOT id=$id")->result();
        } else {
            return $this->db->query("SELECT * FROM users")->result();
        }
        // return $this->db->query("SELECT * FROM USERS")->row();
        // return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    public function regist()
    {
        date_default_timezone_set("Asia/Bangkok");
        $rand = random_string('alnum', 15);
        $config['file_name'] = random_string('alnum', 16);
        $config['upload_path'] = './assets/images/avatar/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            $data = array(
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                "name" => $this->input->post('name'),
                "alamat" => $this->input->post('alamat'),
                "foto" => $this->upload->data('file_name'),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            );
            return $this->db->insert($this->table, $data);
            echo ('');
        } else {
            echo ($this->upload->display_errors());
        }
    }

    public function login($password, $user)
    {
        if (password_verify($password, $user->password)) {
            $this->session->set_userdata([
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'alamat' => $user->alamat,
                'foto' => $user->foto,
                'logged_in' => TRUE
            ]);
            redirect("/");
        } else {
            redirect("/");
        }
    }
}
