<?php
$message = '';
$query_models = $obj_models->select_all_models_info_for_sample();
$query_soft_version = $obj_soft_version->select_all_soft_version();
$query_ecn_type = $obj_after_sales->select_all_ecn_type();

if (isset($_POST['btn'])) {
    $message = $obj_after_sales->save_after_sales_software_info($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">After Sales Software Info </p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id" required>
                                <option> --- Select Model Name --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  { extract($all_models); ?>
                                <option value="<?php echo $id_model; ?>"><?php echo $name; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Released SW Version</label>
                        <div class="col-lg-9">
                            <input type="text" name="released_sw_version" class="form-control" required/> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Issue Description</label>
                        <div class="col-lg-9">
                            <textarea name="issue_description" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Defected SW Version</label>
                        <div class="col-lg-9">
                            <input type="text" name="defected_sw_version" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">SW Confirmation Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="sw_confirmation_date" id="sw_confirmation_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">FTP Upload Date</label>
                        <div class="col-lg-3">
                            <input type="date" name="ftp_upload_date" id="ftp_upload_date" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3">FOTA Confirmation Date</label>
                        <div class="col-lg-3">
                            <input type="date" name="fota_confirmation_date" id="fota_confirmation_date" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">SW Version</label>
                        <div class="col-lg-3">
                        <select class="form-control" name="sw_version_id">
                                <option>--- Select Soft. Version ---</option>
                               <?php  while ( $all_soft_version = mysqli_fetch_assoc($query_soft_version)) {extract($all_soft_version); ?>
                                <option value="<?php echo $id; ?>"><?php echo $version; ?></option>
                               <?php };?>
                            </select>
                        </div>
                        <label class="control-label col-lg-3">ECN Type</label>
                        <div class="col-lg-3 ">
                            <select class="form-control" name="ecn_id">
                                <option>--- Select ECN Type ---</option>
                               <?php  while ( $all_ecn_type = mysqli_fetch_assoc($query_ecn_type)) { ?>
                                <option value="<?php echo $all_ecn_type['id']; ?>"><?php echo $all_ecn_type['type']; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Remarks</label>
                        <div class="col-lg-9">
                            <textarea name="remarks" class="form-control" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Save After Sales Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/date_picker.js"></script>