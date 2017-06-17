<?php
   $query_models = $obj_models->select_all_models_info_for_sample();
   $message='';
   
   if(isset($_POST['btn'])) {
       $message=$obj_sample->save_sample_info($_POST);
   }  
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Add New Sample</p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Sample Signature</label>
                        <div class="col-lg-9">
                            <input type="text" name="sample_signature" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Model Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="model_id">                                
                                <option> --- Select Model --- </option>
                               <?php  while ( $all_models = mysqli_fetch_assoc($query_models))  { extract($all_models); ?>
                                <option value="<?php echo $id_model; ?>"><?php echo $name; ?></option>
                               <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">in_date</label>
                        <div class="col-lg-9">
                            <input type="text" id="in_date" name="in_date" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> purpose</label>
                        <div class="col-lg-9">
                            <input type="text" name="purpose" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">remarks</label>
                        <div class="col-lg-9">
                            <textarea name="remarks" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Save Sample Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/backend/date_picker.js"></script>