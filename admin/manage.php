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
        <h3 class="content-header-title">Manage</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active">Manage
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div id="allProductsTable" class="content-body w-100">
      <!-- DOM - jQuery events table -->
      <?php include 'allProducts.php'; ?>
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
      var quantity = this.getAttribute('data-val');
      if (quantity > 0) {
        Swal.fire({
          title: 'Are you sure?',
          icon: "warning",
          input: 'range',
          inputLabel: "How many to delete",
          inputAttributes: {
            min: 1,
            max: quantity,
            step: 1
          },
          inputValue: 1,
          showCancelButton: true,
          confirmButtonText: 'Delete',
          showLoaderOnConfirm: true,
          preConfirm: (result) => {
            $.ajax({
              url: "app/product?id=" + id + "&quantity=" + result,
              type: "GET",
              success: function(inputValue) {
                return true;
              }
            });
          },
          allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Changes made successfully!',
              showConfirmButton: false,
              timer: 1500
            })
            // $('#allProductsTable').load(document.URL + ' #allProductsTable');
            setTimeout(function() { // wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
            }, 1500);
          }
        })
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Item is already out of stock!',
        })
      }
    });
  });
</script>