<?php
$id_model = $_GET['id'];
$query_models = $obj_models->models_details_home($id_model);
$query_soft_info = $obj_soft_info->soft_details_home($id_model);
$query_after_sales = $obj_after_sales->after_sales_home($id_model);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                Product Information Goes Here
            </div>
            <div>
                <div class="text-center text-success" style="font-size: 150%; color: #0099cc;">--- Model Information ---</div><br/>
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>SL #</th>
                            <th>Name</th>
                            <th>Phone Type</th>
                            <th>Owner Name</th>
                            <th>Supplier Name</th>
                            <th>Spec and NPD</th>
                            <th>PO Date</th>
                            <th>Launching Year</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $i = 1;
                        while ($all_models_info = mysqli_fetch_assoc($query_models)) {
                            extract($all_models_info);
                            ?>
                            <tr class="odd gradeX">
                                <td> <?php echo $i; ?></td>
                                <td><?php echo $name; ?></td>
                                <td>
                                    <?php
                                    if ($phone_type == 0) {
                                        echo 'Feature Phone';
                                    } elseif ($phone_type == 1) {
                                        echo 'Smart Phone';
                                    } else {
                                        echo 'Tab';
                                    }
                                    ?>
                                </td>
                                <td><?php echo $owner_name; ?></td>
                                <td> <?php echo $Supplier_Name; ?> </td>
                                <td> <?php echo $Spec_and_NPD; ?> </td>
                                <td> <?php echo $po_date; ?> </td>
                                <td> <?php echo $Launching_Year; ?> </td>

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
    <div class="panel-body">
        <div class="text-center text-success" style="font-size: 150%; color: #cc0066; ">--- Software Information ---</div>
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr class="text-center">
                        <th>SL#</th>
                        <th>Model Name</th>

                        <th>Soft. Version</th>
                        <th>PDS Release</th>
                        <th>Actual Release</th>
                        <th>PDS SW Feedback</th>
                        <th>Actual SW Feedback</th>

                        <th>Closed Issue</th>
                        <th>New Issue</th>

                        <th>Total Open Issue</th>
                        <th>Re-opened Issue</th>
                        <th>Running Change</th>

                        <th>MP</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($all_soft_info = mysqli_fetch_assoc($query_soft_info)) {
                        extract($all_soft_info);
                        ?>
                        <tr class="odd gradeX text-center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $model_name; ?></td>
                            <td><?php echo $version; ?></td>
                            <td><?php echo $pds_release_date; ?></td>
                            <td><?php echo $actual_release_date; ?></td>
                            <td><?php echo $pds_sw_feedback_date; ?></td>
                            <td><?php echo $actual_sw_feedback_date; ?></td>
                            <td><?php echo $closed_issue; ?></td>
                            <td><?php echo $new_issue; ?></td>
                            <td><?php echo $total_open_issue; ?></td>

                            <td><?php echo $re_opened_issues; ?></td>
                            <td><?php echo $running_changes; ?></td>
                            <td><?php
                    if ($MP == 1) {
                        echo 'YES';
                    } else {
                        echo 'NO';
                    }
                        ?></td>
                            <td><?php echo $remarks; ?></td>
                        </tr>
                        <?php
                        $i++;
                    };
                    ?>
                </tbody>
            </table>
        </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead" style="color: #990099;">
                --- After Sales Information ---
                </div>
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr class="text-center">
                            <th>SL#</th>
                            <th>Model Name</th>

                            <th>Released SW Ver</th>
                            <th>Issue Description</th>

                            <th>Defected SW </th>
                            <th>SW confirm</th>

                            <th>FTP Upload</th>
                            <th>FOTA Confirm</th>

                            <th>Soft. Version</th>
                            <th>ECN Type</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($all_after_sales = mysqli_fetch_assoc($query_after_sales)) {
                            extract($all_after_sales);
                            ?>
                            <tr class="odd gradeX text-center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $model_name; ?></td>

                                <td><?php echo $released_sw_version; ?></td>
                                <td><?php echo $issue_description; ?></td>

                                <td><?php echo $defected_sw_version; ?></td>
                                <td><?php echo $sw_confirmation_date; ?></td>

                                <td><?php echo $ftp_upload_date; ?></td>
                                <td><?php echo $fota_confirmation_date; ?></td>

                                <td><?php echo $version; ?></td>
                                <td><?php echo $ecn_type; ?></td>

                                <td><?php echo $remarks; ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>