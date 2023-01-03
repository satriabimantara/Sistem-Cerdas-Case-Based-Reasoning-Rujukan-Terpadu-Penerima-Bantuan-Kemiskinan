<?php
class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function verifyUser($data)
    {
        $username_user = $data['username_user'];
        $query = "SELECT * FROM user WHERE username_user =:username_user";
        $this->db->query($query);
        $this->db->bind_param("username_user", $username_user);
        $this->db->execute();
        return $this->db->single();
    }
}
