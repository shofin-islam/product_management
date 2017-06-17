<?php
$message='';
$id_model = $_GET['id'];

$query_project_owner = $obj_manpower->select_all_project_owner();
$query_suppliers = $obj_supplier->select_all_suppliers_info();

$query_result = $obj_models->edit_model_info_by_id($id_model);
$model_info = mysqli_fetch_assoc($query_result);
extract($model_info);

if (isset($_POST['btn'])) {
    $obj_models->update_model_info_by_id($_POST);
}
?>
<head>   <meta charset="utf-8"><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  <script src="//code.jquery.com/jquery-1.10.2.js"></script>  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  <link rel="stylesheet" href="datePicker.css">   </head>﻿
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="text-center text-success lead">Edit Model Info</p>
                <h3 class="text-center text-success lead"><?php echo $message; ?></h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" name="edit_model_info" method="post">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Name</label>
                        <div class="col-lg-9">
                            <input type="text" name="name" value="<?php echo $name;?>" class="form-control" required>
                        <input type="hidden" name="id_model" value="<?php echo $id_model; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Phone Type</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="phone_type">
                                <option> --- Select Phone Type --- </option>                               
                                    <option value="0">Feature Phone</option>
                                    <option value="1">Smart Phone</option>                          
                                    <option value="3">TAB</option>                          
                            </select>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Project Owner Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="product_owner_id">
                                <option> --- Select Project Owner --- </option>
                                <?php while ($all_project_owner = mysqli_fetch_assoc($query_project_owner)) { ?>
                                    <option value="<?php echo $all_project_owner['id']; ?>"><?php echo $all_project_owner['Name']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"> Supplier Name</label>
                        <div class="col-lg-9">
                            <select class="form-control" name="supplier_id">

                                <option> --- Select Supplier --- </option>
                                <?php while ($all_suppliers = mysqli_fetch_assoc($query_suppliers)) { ?>
                                    <option value="<?php echo $all_suppliers['id']; ?>"><?php echo $all_suppliers['Supplier_Name']; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Spec_and_NPD</label>
                        <div class="col-lg-9">
                            <input type="text" name="Spec_and_NPD" value="<?php echo $Spec_and_NPD;?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">po_date</label>
                        <div class="col-lg-9">
                            <input type="date" name="po_date" id="po_date" value="<?php echo $po_date;?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">Launching_Year</label>
                        <div class="col-lg-9">
                            <input type="text" name="Launching_Year" value="<?php echo $Launching_Year;?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <input type="submit" name="btn" value="Update model Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/backend/date_picker.js"></script>
<script>
    document.forms['edit_model_info'].elements['phone_type'].value = '<?php echo $phone_type; ?>';
    document.forms['edit_model_info'].elements['product_owner_id'].value = '<?php echo $product_owner_id; ?>';
    document.forms['edit_model_info'].elements['supplier_id'].value = '<?php echo $supplier_id; ?>';
</script>