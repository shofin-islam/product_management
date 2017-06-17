<?php
$message = '';
$query_models = $obj_models->select_all_models_info_for_sample();
$query_soft_version = $obj_soft_version->select_all_soft_version();

$sw_id=$_GET['id'];

$query_soft_info_by_id = $obj_soft_info->select_all_soft_info_by_id($sw_id);
$soft_info_by_id=mysqli_fetch_assoc($query_soft_info_by_id);
extract($soft_info_by_id);

if (isset($_POST['btn'])) {
    $message = $obj_soft_info->update_soft_info($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Update Software Info </p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" name="soft_info" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id">
                                <option> --- Select Model Name --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  {?>
                                <option value="<?php echo $all_models['id_model']; ?>"><?php echo $all_models['name']; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Soft. Version</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="sw_version_id">
                                <option> --- Select Soft. Version --- </option>
                               <?php  while ( $all_soft_version = mysqli_fetch_assoc($query_soft_version)) {extract($all_soft_version); ?>
                                <option value="<?php echo $all_soft_version['id']; ?>"><?php echo $all_soft_version['version']; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Pds Release Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="pds_release_date" value="<?php echo $pds_release_date; ?>" id="pds_release_date" class="form-control" >
                            <input type="hidden" name="sw_id" value="<?php echo $sw_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Actual Rrelease Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="actual_release_date" value="<?php echo $actual_release_date; ?>" id="actual_release_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">PDS SW Feedback Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="pds_sw_feedback_date" value="<?php echo $pds_sw_feedback_date; ?>" id="pds_sw_feedback_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Actual SW Feedback Date</label>
                        <div class="col-lg-9">
                            <input type="date" name="actual_sw_feedback_date" value="<?php echo $actual_sw_feedback_date; ?>" id="actual_sw_feedback_date" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> Closed Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="closed_issue" value="<?php echo $closed_issue; ?>" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3"> New Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="new_issue" value="<?php echo $new_issue; ?>" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">Total Open Issue</label>
                        <div class="col-lg-2">
                            <input type="number" name="total_open_issue" value="<?php echo $total_open_issue; ?>" class="form-control" >
                        </div>
                        <label class="control-label col-lg-3">re opened issues</label>
                        <div class="col-lg-2">
                            <input type="number" name="re_opened_issues" value="<?php echo $re_opened_issues; ?>" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> running changes</label>
                        <div class="col-lg-2">
                            <input type="number" name="running_changes" value="<?php echo $running_changes; ?>" class="form-control" >
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
                            <textarea name="remarks" class="form-control" rows="6"><?php echo $remarks; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update Software Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/date_picker.js"></script>
<script>
    document.forms['soft_info'].elements['model_id'].value='<?php echo $model_id; ?>';
    document.forms['soft_info'].elements['sw_version_id'].value='<?php echo $sw_version_id; ?>';
    document.forms['soft_info'].elements['MP'].value='<?php echo $MP; ?>';
</script>