<?php
$message = '';
$query_models = $obj_models->select_all_models_info_for_sample();
$query_soft_version = $obj_soft_version->select_all_soft_version();
$query_ecn_type = $obj_after_sales->select_all_ecn_type();

$as_sw_id=$_GET['id'];

$query_after_sales_info_by_id = $obj_after_sales->select_after_sales_info_by_id($as_sw_id);
$after_sales_info_by_id=mysqli_fetch_assoc($query_after_sales_info_by_id);
extract($after_sales_info_by_id);

if (isset($_POST['btn'])) {
    $message = $obj_after_sales->update_after_sales_info($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Update After Sales Software Info </p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" name="after_sales" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id" required>
                                <option> --- Select Model Name --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  { extract($all_models); ?>
                                <option value="<?php echo $all_models['id_model']; ?>"><?php echo $all_models['name']; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Released SW Version</label>
                        <div class="col-lg-9">
                            <input type="text" name="released_sw_version" value="<?php echo $released_sw_version; ?>" class="form-control" required/> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Issue Description</label>
                        <div class="col-lg-9">
                            <textarea name="issue_description" class="form-control" rows="6"><?php echo $issue_description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Defected sw version</label>
                        <div class="col-lg-9">
                            <input type="text" name="defected_sw_version" value="<?php echo $defected_sw_version; ?>" class="form-control" >
                        <input type="hidden" name="as_sw_id" value="<?php echo $as_sw_id; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">SW Confirmation Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="sw_confirmation_date" id="sw_confirmation_date" value="<?php echo $sw_confirmation_date; ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> FTP upload date</label>
                        <div class="col-lg-3">
                            <input type="date" name="ftp_upload_date" id="ftp_upload_date" value="<?php echo $ftp_upload_date; ?>" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3"> FOTA Confirmation Date</label>
                        <div class="col-lg-3">
                            <input type="date" name="fota_confirmation_date" id="fota_confirmation_date" value="<?php echo $fota_confirmation_date; ?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">SW Version</label>
                        <div class="col-lg-3">
                        <select class="form-control" name="sw_version_id">
                                <option> --Soft. Version-- </option>
                               <?php  while ( $all_soft_version = mysqli_fetch_assoc($query_soft_version)) {extract($all_soft_version); ?>
                                <option value="<?php echo $id; ?>"><?php echo $version; ?></option>
                               <?php };?>
                            </select>
                        </div>
                        <label class="control-label col-lg-3">ECN Type</label>
                        <div class="col-lg-3">
                            <select class="form-control" name="ecn_id">
                                <option> -Select ECN Type- </option>
                               <?php  while ( $all_ecn_type = mysqli_fetch_assoc($query_ecn_type)) {; ?>
                                <option value="<?php echo $all_ecn_type['id']; ?>"><?php echo $all_ecn_type['type']; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Remarks</label>
                        <div class="col-lg-9">
                            <textarea name="remarks" class="form-control" rows="6"><?php echo $remarks; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update After Sales Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/date_picker.js"></script>
<script>
    document.forms['after_sales'].elements['model_id'].value='<?php echo $model_id; ?>';
    document.forms['after_sales'].elements['sw_version_id'].value='<?php echo $sw_version_id; ?>';
    document.forms['after_sales'].elements['ecn_id'].value='<?php echo $ecn_id; ?>';
</script>