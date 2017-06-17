<?php

class Models extends Db_connect{
    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_models_info($data) {
        extract($data);
        $sql="INSERT INTO model_info (name, phone_type, product_owner_id,supplier_id,Spec_and_NPD,po_date,Launching_Year) VALUES ('$name', '$phone_type', '$product_owner_id', '$supplier_id','$Spec_and_NPD','$po_date','$Launching_Year' )";
        if(mysqli_query($this->link, $sql)) {
            $message="Models info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    
    public function select_all_models_info() {
        $sql="SELECT mo.*,m.Name as owner_name,s.Supplier_Name FROM model_info as mo INNER JOIN manpower m ON m.id=mo.product_owner_id INNER JOIN suppliers s ON s.id=mo.supplier_id WHERE Launching_Year >= 2017 ORDER BY mo.po_date DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function select_all_models_info_for_sample() {
        $sql="SELECT name,id_model FROM `model_info` WHERE `Launching_Year`>=2017 ORDER BY `id_model` DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function edit_model_info_by_id($id_model) {
        $sql = "SELECT * FROM model_info WHERE id_model=$id_model";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function update_model_info_by_id($data) {
        extract($data);
        $sql = "UPDATE model_info SET name = '$name', phone_type = '$phone_type', product_owner_id = '$product_owner_id', supplier_id='$supplier_id',Spec_and_NPD='$Spec_and_NPD',po_date='$po_date',Launching_Year='$Launching_Year' WHERE id_model = '$id_model'";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'Model info update successfully';
            header('Location: manage_model.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function delete_model_info_by_id($id_model) {
        $sql = "DELETE FROM model_info WHERE id_model = '$id_model' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete Model Info Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
    public function select_all_models_info_for_home() {
        $sql="SELECT mo.name,mo.id_model,m.Name FROM `model_info` as mo INNER JOIN manpower m ON m.id=mo.product_owner_id WHERE `Launching_Year`>=2017 ORDER BY `id_model` DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function models_details_home($id_model) {
        $sql="SELECT mo.*,m.Name as owner_name,s.Supplier_Name FROM model_info as mo INNER JOIN manpower m ON m.id=mo.product_owner_id INNER JOIN suppliers s ON s.id=mo.supplier_id WHERE Launching_Year >= 2017 AND id_model='$id_model' ORDER BY mo.po_date DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}
