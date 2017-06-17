<?php

class Manpower extends Db_connect {

    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }

    public function select_all_manpower_info() {
        $sql = "SELECT * FROM manpower ORDER BY id ASC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function export_manpower_info() {
        $sql = "SELECT * FROM manpower ORDER BY id ASC";
        
            $query_result = mysqli_query($this->link, $sql);
            if (mysqli_num_rows($query_result) > 0) {
                $output.='<table border="1">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Name</th>
                            <th>Edison ID</th>
                            <th>Email</th>
                            <th>Role</th>
                            
                        </tr>
                    </thead>';

                $i = 1;
                while ($manpower_info = mysqli_fetch_assoc($query_result)) {
                    extract($manpower_info);
                    $output.='<tr>
                                <td>' .$i. '</td>
                                <td>' .$Name . '</td>
                                <td>' . $edison_id . '</td>
                                <td>' . $email . '</td>
                                <td>' . $Role . '</td>
                                </tr>';
                    $i++;
                }
                
                $output.='</table>';

                header('Content-Type: application/xls');
                header('Content-Disposition: attachment; filename=download.xls');
                return $output;
            }
        
    }

    public function select_manpower_info_by_id($manpower_id) {
        $sql = "SELECT * FROM manpower WHERE id=$manpower_id";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    public function update_manpower_info_by_id($data) {
        extract($data);
        $sql = "UPDATE manpower SET Name = '$Name', edison_id = '$edison_id', email = '$email', Role='$Role' WHERE id = '$id'";
        if (mysqli_query($this->link, $sql)) {
            $_SESSION['message'] = 'Manpower info update successfully';
            header('Location: manage_manpower.php');
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

    public function delete_manpower_info_by_id($id) {
        $sql = "DELETE FROM manpower WHERE id = '$id' ";
        if (mysqli_query($this->link, $sql)) {
            $message = 'Manpower Delete Successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
    
    public function select_all_project_owner() {
        $sql = "SELECT * FROM manpower WHERE Role='PO' ";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }

}
