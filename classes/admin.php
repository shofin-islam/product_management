<?php

class admin extends Db_connect{
    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_admin_info($data) {
        extract($data);
        $password = md5($password);
        if ($data['password'] == $data['confirm_password']){
          $sql="INSERT INTO tbl_admin (admin_name, email_address, password) VALUES ('$admin_name', '$email_address', '$password' )";
        if(mysqli_query($this->link, $sql)) {
            $message="New Admin Added Successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }  
        }else{
            die('Password Not Match. Please try again');
        }   
    }
    public function select_all_admin() {
        $sql="SELECT * FROM `tbl_admin`";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function delete_admin_by_id($admin_id) {
        $sql = "DELETE FROM tbl_admin WHERE admin_id = '$admin_id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}
