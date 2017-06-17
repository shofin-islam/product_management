<?php

class After_sales extends Db_connect{
   public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_after_sales_software_info($data) {
        extract($data);
        $sql = "INSERT INTO sw_after_sales (model_id,released_sw_version, issue_description,defected_sw_version, sw_confirmation_date,ftp_upload_date,fota_confirmation_date,sw_version_id,ecn_id,remarks) VALUES ('$model_id','$released_sw_version','$issue_description', '$defected_sw_version','$sw_confirmation_date','$ftp_upload_date','$fota_confirmation_date','$sw_version_id','$ecn_id','$remarks')";                
        if(mysqli_query($this->link, $sql)) {
            $message="After Sales info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function update_after_sales_info($data) {
        extract($data);
        $sql = "UPDATE sw_after_sales SET model_id='$model_id',released_sw_version='$released_sw_version',issue_description='$issue_description',defected_sw_version='$defected_sw_version',sw_confirmation_date='$sw_confirmation_date',ftp_upload_date='$ftp_upload_date',fota_confirmation_date='$fota_confirmation_date',sw_version_id='$sw_version_id',ecn_id='$ecn_id', remarks='$remarks' WHERE as_sw_id = '$as_sw_id'";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'After Sales info update successfully';
            header('Location: manage_after_sales_issues.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function select_all_after_sales_info() {
        $sql="SELECT afs.*,m.name as model_name,sv.version,ecn.type as ecn_type FROM sw_after_sales as afs INNER JOIN model_info m ON m.id_model = afs.model_id INNER JOIN sw_version_running sv ON sv.id=afs.sw_version_id INNER JOIN ecn_type ecn ON ecn.id=afs.ecn_id ORDER BY afs.as_sw_id DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function select_after_sales_info_by_id($as_sw_id) {
        $sql="SELECT afs.*,m.name as model_name,sv.version,ecn.type as ecn_type FROM sw_after_sales as afs INNER JOIN model_info m ON m.id_model = afs.model_id INNER JOIN sw_version_running sv ON sv.id=afs.sw_version_id INNER JOIN ecn_type ecn ON ecn.id=afs.ecn_id WHERE as_sw_id='$as_sw_id'";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
    public function delete_after_sales_info_by_id($as_sw_id) {
        $sql = "DELETE FROM sw_after_sales WHERE as_sw_id = '$as_sw_id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete After Sales Info Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function select_all_ecn_type() {
        $sql="SELECT * FROM ecn_type";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function after_sales_home($id_model) {
        $sql="SELECT afs.*,m.name as model_name,sv.version,ecn.type as ecn_type FROM sw_after_sales as afs INNER JOIN model_info m ON m.id_model = afs.model_id INNER JOIN sw_version_running sv ON sv.id=afs.sw_version_id INNER JOIN ecn_type ecn ON ecn.id=afs.ecn_id Where afs.model_id='$id_model' ORDER BY afs.as_sw_id DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
}
