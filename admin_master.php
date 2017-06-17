<?php
ob_start();
session_start();
require 'classes/login_signup.php';

$obj_login_signup = new Login_signup();

require './classes/admin.php';
$obj_admin = new admin();

require './classes/manpower.php';
$obj_manpower = new Manpower();

require './classes/supplier.php';
$obj_supplier = new Supplier();

require './classes/models.php';
$obj_models = new Models();

require './classes/sample.php';
$obj_sample = new Sample();

require './classes/soft_version.php';
$obj_soft_version = new Soft_version();

require './classes/soft_info.php';
$obj_soft_info = new Soft_info();

require './classes/after_sales.php';
$obj_after_sales = new After_sales();




if ($_SESSION['admin_id'] == NULL) {
    header('Location: index.php');
}


if (isset($_GET['status'])) {
    if ($_GET['status'] == 'logout') {
        $obj_login_signup->admin_logout();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Product Management Admin</title>
        <!-- Bootstrap Core CSS -->
        <link href="assets/backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/backend/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="assets/backend/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="assets/backend/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/backend/dist/css/sb-admin-2.css" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="assets/backend/vendor/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/backend/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script>
            function check_delete_status() {
                var check = confirm('Are you sure to delete this !');
                if (check) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Product Management Admin</a>
                </div>
                <?php include './includes/top_menu.php'; ?>
                <?php include './includes/sidebar.php'; ?>
            </nav>  

            <div id="page-wrapper">
                <?php
                if (isset($pages)) {
                    if ($pages == 'manage_manpower') {
                        include './pages/manage_manpower_content.php';
                    } 
                    else if ($pages == 'edit_manpower') {
                        include './pages/edit_manpower_content.php';
                    }
                    else if ($pages == 'manage_supplier') {
                        include './pages/manage_supplier_content.php';
                    }
                    else if ($pages == 'add_model') {
                        include './pages/add_model_content.php';
                    }
                    else if ($pages == 'manage_model') {
                        include './pages/manage_model_content.php';
                    }
                    else if ($pages == 'edit_model') {
                        include './pages/edit_model_content.php';
                    }
                    else if ($pages == 'add_sample') {
                        include './pages/add_sample_content.php';
                    }
                    else if ($pages == 'manage_sample') {
                        include './pages/manage_sample_content.php';
                    }
                    else if ($pages == 'edit_sample') {
                        include './pages/edit_sample_content.php';
                    }
                    else if ($pages == 'add_admin') {
                        include './pages/add_admin_content.php';
                    }
                    else if ($pages == 'manage_admin') {
                        include './pages/manage_admin_content.php';
                    }
                    else if ($pages == 'add_soft_version') {
                        include './pages/add_soft_version_content.php';
                    }
                    else if ($pages == 'manage_soft_version') {
                        include './pages/manage_soft_version_content.php';
                    }
                    else if ($pages == 'add_soft_info') {
                        include './pages/add_soft_info_content.php';
                    }
                    else if ($pages == 'manage_soft_info') {
                        include './pages/manage_soft_info_content.php';
                    }
                    else if ($pages == 'edit_soft_info') {
                        include './pages/edit_soft_info_content.php';
                    }
                    else if ($pages == 'add_after_sales_issue') {
                        include './pages/add_after_sales_issue_content.php';
                    }
                    else if ($pages == 'manage_after_sales_issues') {
                        include './pages/manage_after_sales_issues_content.php';
                    }
                    else if ($pages == 'edit_after_sales_info') {
                        include './pages/edit_after_sales_info_content.php';
                    }
                    else if ($pages == 'search_model_info') {
                        include './pages/search_model_info_content.php';
                    }
                    else if ($pages == 'view_details') {
                        include './pages/view_details_content.php';
                    }
                } else {
                    include './pages/home_content.php';
                }
                ?>
            </div>
        </div>
        <script src="assets/backend/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="assets/backend/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/backend/vendor/metisMenu/metisMenu.min.js"></script>
        <!-- Morris Charts JavaScript -->
        <script src="assets/backend/vendor/raphael/raphael.min.js"></script>
        <script src="assets/backend/vendor/morrisjs/morris.min.js"></script>
        <script src="assets/backend/data/morris-data.js"></script>
        <script src="assets/backend/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/backend/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
        <script src="assets/backend/vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script src="assets/backend/dist/js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });

        </script>
    </body>
</html>
