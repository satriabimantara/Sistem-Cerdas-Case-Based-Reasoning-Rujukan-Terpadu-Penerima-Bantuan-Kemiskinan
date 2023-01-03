<?php
class Registrasi_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function checkIsSameUser($data)
    {
        $email_user = $data['input_email_user'];
        $hp_user = $data['input_hp_user'];
        $username_user = $data['input_username_user'];

        $query = "SELECT id_user FROM user WHERE email_user =:email_user OR hp_user =:hp_user OR username_user =:username_user ";
        $this->db->query($query);
        $this->db->bind_param("email_user", $email_user);
        $this->db->bind_param("hp_user", $hp_user);
        $this->db->bind_param("username_user", $username_user);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function insertNewUser($data_user)
    {
        $nama_user = $data_user['input_nama_user'];
        $email_user = $data_user['input_email_user'];
        $hp_user = $data_user['input_hp_user'];
        $username_user = $data_user['input_username_user'];
        $password_user = password_hash($data_user['input_password_user'], PASSWORD_DEFAULT);
        $status_user = $data_user['input_status_user'];
        $repeat_password = $data_user['input_repeat_password'];
        $query = "INSERT INTO user VALUES ('',:nama_user,:email_user,:hp_user,:username_user,:password_user,:status_user)";
        $this->db->query($query);
        $this->db->bind_param("nama_user", $nama_user);
        $this->db->bind_param("email_user", $email_user);
        $this->db->bind_param("hp_user", $hp_user);
        $this->db->bind_param("username_user", $username_user);
        $this->db->bind_param("password_user", $password_user);
        $this->db->bind_param("status_user", $status_user);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
