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
                <h3 class="content-header-title">Users</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a>
                            </li>
                            <li class="breadcrumb-item">Users
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div id="allUsersTable" class="content-body w-100">
            <!-- DOM - jQuery events table -->
            <?php include 'allUsers.php'; ?>
            <!-- DOM - jQuery events table -->
        </div>
    </div>
</div>
<!-- END: Content-->
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('.cancel-button').on('click', function() {
            var id = this.id;
            var ownID = this.getAttribute('data-myId');
            if (id == ownID) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You cannot delete yourself!',
                })
            } else {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: "warning",
                    text: 'This user will no be able to use the system.',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            url: "app/user?id=" + id,
                            type: "GET",
                            success: function() {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Changes made successfully!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(function() { // wait for 5 secs(2)
                                    location.reload(); // then reload the page.(3)
                                }, 1500);
                            }
                        });
                    }
                })
            }
        });
    });
</script>