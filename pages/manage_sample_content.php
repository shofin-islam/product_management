<?php
$message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $id = $_GET['id'];
        $message = $obj_sample->delete_sample_by_id($id);
    }
}
$query_result = $obj_sample->select_all_sample_info();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center text-success">
            <?php echo $message; ?>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All Sample Information Goes Here
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Sample Signature</th>
                            <th>model Name</th>
                            <th>In Date</th>
                            <th>Purpose</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_sample_info = mysqli_fetch_assoc($query_result)) {
                            extract($all_sample_info);
                            ?>
                            <tr class="odd gradeX">
                                <td> <?php echo $i; ?> </td>
                                <td><?php echo $sample_signature; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $in_date; ?></td>
                                <td> <?php echo $purpose; ?> </td>
                                <td> <?php echo $remarks; ?> </td>                                                             
                                <td class="center">
                                    <a href="edit_sample.php?id=<?php echo $id; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                        <?php if ($_SESSION['is_superuser'] == 1) { ?>
                                        <a href="?status=delete&&id=<?php echo $id; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    <?php } ?>
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