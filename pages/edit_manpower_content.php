<?php 
$manpower_id = $_GET['id'];

$query_result = $obj_manpower->select_manpower_info_by_id($manpower_id);

$manpower_info_by_id = mysqli_fetch_assoc($query_result);

extract($manpower_info_by_id);

if (isset($_POST['btn'])) {
    $obj_manpower->update_manpower_info_by_id($_POST);
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit Manpower Info</p>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Manpower Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="Name" value="<?php echo $Name; ?>" class="form-control" required>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Edison ID</label>
                        <div class="col-lg-9">
                            <input type="number" name="edison_id" value="<?php echo $edison_id; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Email</label>
                        <div class="col-lg-9">
                            <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Role</label>
                        <div class="col-lg-9">
                            <input type="text" name="Role" value="<?php echo $Role; ?>" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update Manpower Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
