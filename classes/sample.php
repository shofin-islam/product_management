<?php

class Sample extends Db_connect {
   public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_sample_info($data) {
        extract($data);
        $sql="INSERT INTO samples (sample_signature, model_id, in_date,purpose,remarks) VALUES ('$sample_signature', '$model_id', '$in_date', '$purpose','$remarks' )";
        if(mysqli_query($this->link, $sql)) {
            $message="Sample info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    
    public function select_all_sample_info() {
        $sql = "SELECT s.*, m.name,m.id_model FROM samples as s INNER JOIN model_info AS m ON m.id_model=s.model_id";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function edit_sample_info_by_id($sample_id) {
        $sql = "SELECT s.*, m.name,m.id_model FROM samples as s INNER JOIN model_info AS m ON m.id_model=s.model_id WHERE id= $sample_id";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function update_sample_info_by_id($data) {
        extract($data);
        $sql = "UPDATE samples SET sample_signature = '$sample_signature', in_date = '$in_date', purpose='$purpose',remarks='$remarks' WHERE id = '$id'";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'Sample info update successfully';
            header('Location: manage_sample.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function delete_sample_by_id($id) {
        $sql = "DELETE FROM samples WHERE id = '$id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}

    

