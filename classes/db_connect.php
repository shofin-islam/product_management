 <?php

class Db_connect {
    public function database_connection() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'product_management';
        $db_con = mysqli_connect($host_name, $user_name, $password, $db_name);
        if (!$db_con) {
            die('Connection Fail' . mysqli_error($db_con));
        }
        return $db_con;
    }
}
