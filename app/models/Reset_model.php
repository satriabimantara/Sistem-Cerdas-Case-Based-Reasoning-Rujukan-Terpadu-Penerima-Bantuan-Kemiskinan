<?php
class Reset_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function resetAutoIncrementTable($table)
    {
        $query = "ALTER TABLE $table AUTO_INCREMENT = 1";
        $this->db->query($query);
        $this->db->execute();
        return 1;
    }
}
