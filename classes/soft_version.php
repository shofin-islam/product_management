<?php

class Soft_version extends Db_connect{
   public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_soft_version($data) {
        extract($data);
        $sql="INSERT INTO sw_version_running (version) VALUES ('$version')";
        if(mysqli_query($this->link, $sql)) {
            $message="Soft. Version Save Successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_soft_version() {
        $sql="SELECT * FROM sw_version_running";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function delete_software_version_by_id($id) {
        $sql = "DELETE FROM sw_version_running WHERE id = '$id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete Soft. Info Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}
