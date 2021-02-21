<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
include('header.php');
?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Add Product</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="manage.php">Manage</a></li>
                            <li class="breadcrumb-item active">Add Product
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Input Validation start -->
            <?php include 'addNewProductForm.php'; ?>
            <!-- Input Validation end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<?php include 'footer.php'; ?>