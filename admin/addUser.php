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
                <h3 class="content-header-title">Add User</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item "><a href="users.php">Users</a>
                            </li>
                            <li class="breadcrumb-item active">Add User
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Input Validation start -->
            <?php include 'addNewUserForm.php'; ?>
            <!-- Input Validation end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<?php include 'footer.php'; ?>
<!-- <script src="https://terrylinooo.github.io/jquery.disableAutoFill/assets/js/jquery.disableAutoFill.min.js"></script> -->
<script>
    $(document).ready(function() {
        frm1.password.value = "";
        frm1.confirmpassword.value = "";
        // $('#frm1').disableAutoFill();
        $("#toggle").click(function() {
            // $('#frm1').disableAutoFill();
            $("#in1Hidden, #in2Hidden").prop('disabled', function(j, w) {
                // frm1.password.value = "";
                // frm1.confirmpassword.value = "";
                // $("#in1, #in2").val('');
                return !w;
            })
            $("#in1, #in2").prop('disabled', function(i, v) {
                $("#in1, #in2").val('');
                frm1.password.value = "";
                frm1.confirmpassword.value = "";
                return !v;
            });
        });
    });

    function verifyEdit() {
        if ((frm1.name.value == "" || frm1.name.value == null) ||
            (frm1.role.value == "" || frm1.role.value == null) ||
            (frm1.email.value == "" || frm1.email.value == null)) {
            Swal.fire(
                'Fields empty',
                'Please fill all required fields',
                'error'
            );
            return false;
        }
        // console.log(frm1.password.value !== "");
        // console.log(frm1.confirmpassword.value == "");
        if (frm1.confirmpassword.value != frm1.password.value) {
            Swal.fire(
                'Unmatching passwords',
                'Try again',
                'error'
            )
            return false;
        }
        if (frm1.password.value == "" && frm1.confirmpassword.value !== "") {
            Swal.fire(
                'Enter password!',
                'No password entered',
                'question'
            )
            frm1.password.focus();
            return false;
        }

        if (frm1.confirmpassword.value == "" && frm1.password.value !== "") {
            Swal.fire(
                'Enter confirm password!',
                'No confirm password entered',
                'question'
            )
            frm1.password.focus();
            return false;
        }
        if (frm1.password.value !== "" && (frm1.password.value).length < 8) {
            Swal.fire(
                'Incorrect password',
                'Password should be minimum 8 characters.',
                'warning'
            )
            frm1.password.focus();
            return false;
        }

        if (frm1.password.value !== "" && (frm1.password.value).length > 20) {
            Swal.fire(
                'Incorrect password',
                'Password should be maximum 20 characters.',
                'warning'
            )
            frm1.password.focus();
            return false;
        }

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Changes made successfully!',
            showConfirmButton: false
        })
        return true;
    }

    function verifyAdd() {
        if ((frm1.name.value == "" || frm1.name.value == null) ||
            (frm1.role.value == "" || frm1.role.value == null) ||
            (frm1.email.value == "" || frm1.email.value == null)) {
            Swal.fire(
                'Fields empty',
                'Please fill all required fields',
                'error'
            );
            return false;
        }
        if (frm1.password.value == "") {
            Swal.fire(
                'Enter password!',
                'No password entered',
                'question'
            )
            frm1.password.focus();
            return false;
        }
        if ((frm1.password.value).length < 8) {
            Swal.fire(
                'Incorrect password',
                'Password should be minimum 8 characters.',
                'warning'
            )
            frm1.password.focus();
            return false;
        }

        if ((frm1.password.value).length > 20) {
            Swal.fire(
                'Incorrect password',
                'Password should be maximum 20 characters.',
                'warning'
            )
            frm1.password.focus();
            return false;
        }

        if (frm1.confirmpassword.value == "") {
            Swal.fire(
                'Enter password!',
                'Confirm password not entered',
                'question'
            )
            return false;
        }
        if (frm1.confirmpassword.value != frm1.password.value) {
            Swal.fire(
                'Unmatching passwords',
                'Try again',
                'error'
            )
            return false;
        }
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Changes made successfully!',
            showConfirmButton: false
        })
        return true;
    }
</script>