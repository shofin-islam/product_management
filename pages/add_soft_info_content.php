<?php
$message = '';
$query_models = $obj_models->select_all_models_info_for_sample();
$query_soft_version = $obj_soft_version->select_all_soft_version();

if (isset($_POST['btn'])) {
    $message = $obj_soft_info->save_soft_info($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Software Info </p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id">
                                <option> --- Select Model Name --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  { extract($all_models); ?>
                                <option value="<?php echo $id_model; ?>"><?php echo $name; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Soft. Version</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="sw_version_id">
                                <option> --- Select Project Name --- </option>
                               <?php  while ( $all_soft_version = mysqli_fetch_assoc($query_soft_version)) {extract($all_soft_version); ?>
                                <option value="<?php echo $id; ?>"><?php echo $version; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Pds Release Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="pds_release_date" id="pds_release_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Actual Rrelease Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="actual_release_date" id="actual_release_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">PDS SW Feedback Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="pds_sw_feedback_date" id="pds_sw_feedback_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Actual SW Feedback Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="actual_sw_feedback_date" id="actual_sw_feedback_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> Closed Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="closed_issue" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3"> New Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="new_issue" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">Total Open Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="total_open_issue" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3">re opened issues</label>
                        <div class="col-lg-2">
                            <input type="number" name="re_opened_issues" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> running changes</label>
                        <div class="col-lg-2">
                            <input type="number" name="running_changes" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3">MP</label>
                        <div class="col-lg-2">
                            <select class="form-control" name="MP">
                                <option> --- Select MP --- </option>
                               <option value="0"><?php echo 'No';?></option>
                               <option value="1"><?php echo 'Yes';?></option>
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
                            <input type="submit" name="btn" value="Save Software Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/date_picker.js"></script>