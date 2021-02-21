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
                <h3 class="content-header-title">Add Supplier</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item "><a href="suppliers.php">Suppliers</a>
                            </li>
                            <li class="breadcrumb-item active">Add Suppliers
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Input Validation start -->
            <?php include 'addNewSuppForm.php'; ?>
            <!-- Input Validation end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<?php include 'footer.php'; ?>