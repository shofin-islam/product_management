<?php
$message = '';

if (isset($_GET['status'])) {
    $manpower_id = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $message = $obj_manpower->delete_manpower_info_by_id($manpower_id);
    }
}
$query_result = $obj_manpower->select_all_manpower_info();
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
                            <th>Name</th>
                            <th>Edison ID</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($manpower_info = mysqli_fetch_assoc($query_result)) {
                            extract($manpower_info);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $id; ?></td>
                                <td><?php echo $Name; ?></td>
                                <td><?php echo $edison_id; ?></td>
                                <td class="center"> <?php echo $email; ?> </td>
                                <td class="center"> <?php echo $Role; ?> </td>
                                <td class="center">

                                    <a href="edit_manpower.php?id=<?php echo $id; ?>" class="btn btn-success" title="Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <?php if ($_SESSION['is_superuser'] == 1) { ?>
                                        <a href="?status=delete&&id=<?php echo $id; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_status();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                        <?php }?>
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
        </div>
    </div>
</div>