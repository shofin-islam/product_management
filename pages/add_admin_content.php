<?php
$message='';

if (isset($_POST['btn'])) {
    $message = $obj_admin->save_admin_info($_POST);
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Add New Admin</p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Admin Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="admin_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Email Address</label>
                        <div class="col-lg-9">
                            <input type="email" name="email_address" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Confirm Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="confirm_password" class="form-control" required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Save New Admin" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>