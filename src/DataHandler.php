<?php 


class DataHandler {

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function classicColumn($data)
    {
        $data = mysqli_real_escape_string($this->conn, $data);

        return $data;        
    }

    public function birthDateColumn($data)
    {
        $data = mysqli_real_escape_string($this->conn, $data);

        return  date('Y-m-d', $data).' 00:00:00';     
    }

    public function ageColumn($data)
    {
        $data = mysqli_real_escape_string($this->conn, $data);
        $date = strtotime(date("Y-m-d H:i:s"). '-'.$data.' year');

        return  date('Y-m-d', $date).' 00:00:00';
    }
}

?>