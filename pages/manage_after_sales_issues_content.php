<?php
$message = '';

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $as_sw_id = $_GET['id'];
        $message = $obj_after_sales->delete_after_sales_info_by_id($as_sw_id);
    }
}


$query_result = $obj_after_sales->select_all_after_sales_info();
//while ($all_project_summary = mysqli_fetch_assoc($query_result)) {
//    echo '<pre>';
//    print_r($all_project_summary); 
//}
//exit();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All After Sales Info Goes Here<br>
                <a href="manage_after_sales_issues.php" class="btn btn-primary" title="Refresh" >
                    <span class="glyphicon glyphicon-refresh"></span>
                </a>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <div class="text-danger text-center">
                        <?php
                        echo $message;
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?>
                    </div>

                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Model Name</th>

                            <th>Released SW Ver</th>
                            <th>Issue Description</th>

                            <th>Defected SW </th>
                            <th>SW confirm</th>

                            <th>FTP Upload</th>
                            <th>FOTA Confirm</th>

                            <th>Soft. Version</th>
                            <th>ECN Type</th>
                            <th>Remarks</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_after_sales = mysqli_fetch_assoc($query_result)) {
                            extract($all_after_sales);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $model_name; ?></td>

                                <td><?php echo $released_sw_version; ?></td>
                                <td><?php echo $issue_description; ?></td>

                                <td><?php echo $defected_sw_version; ?></td>
                                <td><?php echo $sw_confirmation_date; ?></td>

                                <td><?php echo $ftp_upload_date; ?></td>
                                <td><?php echo $fota_confirmation_date; ?></td>

                                <td><?php echo $version; ?></td>
                                <td><?php echo $ecn_type; ?></td>

                                <td><?php echo $remarks; ?></td>
                                <td class="center">
                                    <a href="edit_after_sales_info.php?id=<?php echo $as_sw_id; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <?php if ($_SESSION['is_superuser'] == 1) { ?>                                
                                        <a href="?status=delete&&id=<?php echo $as_sw_id; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    <?php }; ?>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>