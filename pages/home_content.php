<?php
$query_models = $obj_models->select_all_models_info_for_home();
?>


<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-danger">Welcome To Product Management Team</h1>
    </div>
</div>
<div class="row">
    <?php
    $i = 1;
    while ($all_models = mysqli_fetch_assoc($query_models)) {
        extract($all_models);
        ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-3x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $name?></div>
                        <div><?php echo $Name;?></div>
                    </div>
                </div>
            </div>
            <a href="view_details.php?id=<?php echo $id_model; ?>">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <?php }; ?>
</div>
