<?php

require_once '../classes/db_connect.php';
$host_name = 'localhost';
$user_name = 'root';
$password = '';
$db_name = 'product_management';
$db_con = mysqli_connect($host_name, $user_name, $password, $db_name);

$output='';

if (isset($_POST['export_excel'])) {
    $sql = "SELECT * FROM manpower ORDER BY id ASC";

    $query_result = mysqli_query($db_con, $sql);
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
                                <td>' . $i . '</td>
                                <td>' . $Name . '</td>
                                <td>' . $edison_id . '</td>
                                <td>' . $email . '</td>
                                <td>' . $Role . '</td>
                                </tr>';
            $i++;
        }

        $output.='</table>';

        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=download.xls');
        echo $output;
    }
}