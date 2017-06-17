<?php

class Supplier extends Db_connect{
    public $link;

    public function __construct() {
        $this->link = $this->database_connection();
    }

    public function select_all_suppliers_info() {
        $sql = "SELECT * FROM suppliers ORDER BY id ASC";
        if (mysqli_query($this->link, $sql)) {
            $query_result = mysqli_query($this->link, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->link));
        }
    }
}
