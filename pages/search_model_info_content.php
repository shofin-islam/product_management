<?php
if (empty($_POST['model_id'])) {
    header('Location: manage_software_info.php');
}
$model_id = $_POST['model_id'];
//echo $model_id_q;
//$search_model_id_q = preg_replace('#[^0-9a-z]#i', '', $model_id_q);

$query_result = $obj_soft_info->search_model_info($model_id);
$query_models = $obj_models->select_all_models_info_for_sample();
?>
<div class="panel-body">
    <form class="form-horizontal" action="search_model_info.php" method="post">
        <div class="col-lg-3">
            <select class="form-control" name="model_id">
                <option> --- Select Model Name --- </option>
                <?php
                while ($all_models = mysqli_fetch_assoc($query_models)) {
                    extract($all_models);
                    ?>
                    <option value="<?php echo $id_model; ?>"><?php echo $name; ?></option>
                <?php }; ?>
            </select>
        </div>
        <div class="col-lg-2">
            <input type="submit" name="submit" value="Search" class="form-control"/>
        </div>           
    </form>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All Software Information Goes Here<br>
                <a href="manage_software_info.php" class="btn btn-primary" title="Refresh" >
                    <span class="glyphicon glyphicon-refresh"></span>
                </a>
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Model Name</th>

                            <th>Soft. Version</th>
                            <th>PDS Release</th>
                            <th>Actual Release</th>
                            <th>PDS SW Feedback</th>
                            <th>Actual SW Feedback</th>

                            <th>Closed Issue</th>
                            <th>New Issue</th>

                            <th>Total Open Issue</th>
                            <th>Re-opened Issue</th>
                            <th>Running Change</th>

                            <th>MP</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_soft_info = mysqli_fetch_assoc($query_result)) {
                            extract($all_soft_info);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $model_name; ?></td>
                                <td><?php echo $version; ?></td>
                                <td><?php echo $pds_release_date; ?></td>
                                <td><?php echo $actual_release_date; ?></td>
                                
                                <td><?php echo $pds_sw_feedback_date; ?></td>
                                <td><?php echo $actual_sw_feedback_date; ?></td>
                                <td><?php echo $closed_issue; ?></td>
                                <td><?php echo $new_issue; ?></td>
                                <td><?php echo $total_open_issue; ?></td>

                                <td><?php echo $re_opened_issues; ?></td>
                                <td><?php echo $running_changes; ?></td>
                                <td><?php
                        if ($MP == 1) {
                            echo 'YES';
                        } else {
                            echo 'NO';
                        }
                            ?></td>
                                <td><?php echo $remarks; ?></td>
                                <td class="center">
                                    <a href="edit_soft_info.php?id=<?php echo $sw_id; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <?php if ($_SESSION['is_superuser'] == 1) { ?>                                
                                        <a href="?status=delete&&id=<?php echo $sw_id; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
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
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<script src="assets/excel/js/FileSaver.min.js" type="text/javascript"></script>
<script src="assets/excel/js/bootstrap.min_1.js" type="text/javascript"></script>
<script src="assets/excel/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="assets/excel/js/tableexport.min.js" type="text/javascript"></script>
<script>
$('#dataTables-example').tableExport();
</script>