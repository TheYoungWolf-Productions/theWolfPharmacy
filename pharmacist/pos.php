<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
include('header.php');
?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header col-12 mb-2 text-center">
                <button type="button" class="btn btn-icon btn-success mr-1 mb-1 soon-button">PRESS ME <img src="https://img.icons8.com/cotton/64/000000/cat--v4.png" /></button>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        $('.soon-button').on('click', function() {
            Swal.fire({
                title: 'Feature on its way!!!',
                width: 600,
                padding: '3em',
                background: '#fff url(https://sweetalert2.github.io/images/trees.png)',
                backdrop: `rgba(0,0,123,0.4) url("https://sweetalert2.github.io/images/nyan-cat.gif") left top no-repeat`
            })
        })
    })
</script>