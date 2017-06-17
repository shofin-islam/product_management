<?php
$message='';
$sample_id = $_GET['id'];

$query_models = $obj_models->select_all_models_info_for_sample();

$query_result = $obj_sample->edit_sample_info_by_id($sample_id);
$sample_info = mysqli_fetch_assoc($query_result);
extract($sample_info);

if (isset($_POST['btn'])) {
    $obj_sample->update_sample_info_by_id($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Update Sample Info</p>
                <h3 class="text-center text-success lead"></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" name="sample" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">sample_signature</label>
                        <div class="col-lg-9">
                            <input type="text" name="sample_signature" value="<?php echo $sample_signature;?>" class="form-control" required>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id">                                
                                <option> --- Select Model --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  { extract($all_models); ?>
                                <option value="<?php echo $id_model; ?>"><?php echo $name; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-lg-3">in_date</label>
                        <div class="col-lg-9">
                            <input type="datetime" name="in_date" id="in_date" value="<?php echo $in_date;?>" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> purpose</label>
                        <div class="col-lg-9">
                            <input type="text" name="purpose" value="<?php echo $purpose;?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">remarks</label>
                        <div class="col-lg-9">
                            <textarea name="remarks" class="form-control"><?php echo $remarks;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update Sample Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--<script>
    document.forms['sample'].elements['model_id'].value='<?php echo $id_model; ?>';
</script>-->
<script src="../assets/backend/date_picker.js"></script>