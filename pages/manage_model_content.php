<?php
$message = '';
if (isset($_GET['status'])) {
    $id_model = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $message = $obj_models->delete_model_info_by_id($id_model);
    }
}
$query_result = $obj_models->select_all_models_info();
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
                All Models Information Goes Here
            </div>            
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID Model</th>
                            <th>Name</th>
                            <th>Phone Type</th>
                            <th>Owner Name</th>
                            <th>Supplier Name</th>
                            <th>Spec and NPD</th>
                            <th>PO Date</th>
                            <th>Launching Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_models_info = mysqli_fetch_assoc($query_result)) {
                            extract($all_models_info);
                            ?>
                            <tr class="odd gradeX">
                                <td> <?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td>
                                    <?php
                                    if ($phone_type == 0) {
                                        echo 'Feature Phone';
                                    } elseif ($phone_type == 1) {
                                        echo 'Smart Phone';
                                    } else {
                                        echo 'Tab';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $owner_name; ?></td>
                                <td> <?php echo $Supplier_Name; ?> </td>
                                <td> <?php echo $Spec_and_NPD; ?> </td>
                                <td> <?php echo $po_date; ?> </td>
                                <td> <?php echo $Launching_Year; ?> </td>
                                <td class="center">
                                    <a href="edit_model.php?id=<?php echo $id_model; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <?php if ($_SESSION['is_superuser'] == 1) { ?>
                                        <a href="?status=delete&&id=<?php echo $id_model; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
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
                <div>
                    <form action="export_report.php" method="post">
                        <input type="submit" name="export_excel" class="btn btn-success"value="Download-Excel"/>
                    </form>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>