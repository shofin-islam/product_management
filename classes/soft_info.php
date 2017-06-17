<?php

class Soft_info extends Db_connect{
    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }
    public function save_soft_info($data) {
        extract($data);
        $sql = "INSERT INTO sw_info (model_id,sw_version_id, pds_release_date,actual_release_date, pds_sw_feedback_date,actual_sw_feedback_date,closed_issue,new_issue,total_open_issue,re_opened_issues,running_changes,MP,remarks) VALUES ('$model_id','$sw_version_id','$pds_release_date', '$actual_release_date','$pds_sw_feedback_date','$actual_sw_feedback_date','$closed_issue','$new_issue','$total_open_issue','$re_opened_issues','$running_changes','$MP','$remarks')";                
        if(mysqli_query($this->link, $sql)) {
            $message="Software info save successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->link) );
        }
    }
    public function select_all_soft_info() {
        $sql="SELECT s.*,m.name as model_name,sv.version FROM sw_info as s INNER JOIN model_info m ON m.id_model = s.model_id INNER JOIN sw_version_running sv ON sv.id=s.sw_version_id ORDER BY s.sw_id DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function select_all_soft_info_by_id($sw_id) {
        $sql="SELECT s.*,m.name as model_name,sv.version FROM sw_info as s INNER JOIN model_info m ON m.id_model = s.model_id INNER JOIN sw_version_running sv ON sv.id=s.sw_version_id WHERE s.sw_id='$sw_id'";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function update_soft_info($data) {
        extract($data);
        $sql = "UPDATE sw_info SET model_id='$model_id',sw_version_id='$sw_version_id',pds_release_date='$pds_release_date',actual_release_date='$actual_release_date',pds_sw_feedback_date='$pds_sw_feedback_date',actual_sw_feedback_date='$actual_sw_feedback_date',closed_issue='$closed_issue',new_issue='$new_issue',total_open_issue='$total_open_issue',re_opened_issues='$re_opened_issues',running_changes='$running_changes',MP='$MP',remarks='$remarks' WHERE sw_id = '$sw_id'";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'SW info update successfully';
            header('Location: manage_software_info.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function delete_sw_info_info_by_id($sw_id) {
        $sql = "DELETE FROM sw_info WHERE sw_id = '$sw_id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Delete Soft. Info Successfully';
            return $message;
            
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
    public function search_model_info($model_id) {
        $sql="SELECT s.*,m.name as model_name,sv.version FROM sw_info as s INNER JOIN model_info m ON m.id_model = s.model_id INNER JOIN sw_version_running sv ON sv.id=s.sw_version_id WHERE s.model_id='$model_id' ORDER BY s.sw_id DESC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
    public function soft_details_home($id_model) {
        $sql="SELECT s.*,m.name as model_name,sv.version FROM sw_info as s INNER JOIN model_info m ON m.id_model = s.model_id INNER JOIN sw_version_running sv ON sv.id=s.sw_version_id WHERE s.model_id='$id_model' ORDER BY s.sw_id DESC ";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}
