<?php
$message = '';
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'delete') {
        $id = $_GET['id'];
        $message = $obj_soft_version->delete_software_version_by_id($id);
    }
}
$query_result = $obj_soft_version->select_all_soft_version();
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
                All Manpower Information Goes Here
            </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Software Version</th>
                            <?php
                            if ($_SESSION['is_superuser'] == 1) {
                                echo '<th>Action</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_admin = mysqli_fetch_assoc($query_result)) {
                            extract($all_admin);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $version; ?></td>
                                    <?php if ($_SESSION['is_superuser'] == 1) { ?>
                                    <td class="center">                                    
                                        <a href="?status=delete&&id=<?php echo $id; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                    <?php
                                };
                                ?>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <form action="#" method="post">
                        <input type="submit" name="export_excel" class="btn btn-success"value="Download-Excel"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>