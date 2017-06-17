<?php
$query_result = $obj_supplier->select_all_suppliers_info();
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center text-success">
        </h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center lead">
                All Suppliers Information Goes Here
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Supplier_Name</th>
                            <th>Contact1</th>
                            <th>Contact2</th>
                            <th>Contact3</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($suppliers_info = mysqli_fetch_assoc($query_result)) {
                            extract($suppliers_info);
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $Supplier_Name; ?></td>
                                <td><?php echo $Contact1; ?></td>
                                <td><?php echo $Contact2; ?></td>
                                <td class="center"> <?php echo $Contact3; ?> </td>
                                <td class="center"> <?php echo $id; ?> </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>