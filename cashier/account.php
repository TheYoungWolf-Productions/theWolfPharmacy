<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
require_once('constants/fetch-my-info.php');
include('header.php');
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("select email from users");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection to DB failed: " . $e->getMessage();
}
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row mb-1">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">Profile</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item">Edit Profile
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Form control repeater section start -->
            <section id="form-control-repeater">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Avator</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body text-center">
                                    <?php
                                    if ($myvataor == null) { ?>
                                        <img src="../public/assets/uploads/avatar/70520.png" alt="avatar">
                                    <?php } else {

                                        print ' <img  id="blah" class="card-img-left myavatar"  src="../public/assets/uploads/avatar/' . $myvataor . '" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="tel-repeater">User Profile</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form name="frm" action="app/update-profile.php" method="POST" autocomplete="OFF" enctype="multipart/form-data">
                                        <div class="form-group col-12 mb-2">
                                            <input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $myemail; ?>">
                                        </div>
                                        <div class="form-group col-12 mb-2">

                                            <!-- <input type="file" onchange="readURL(this);" name="image" accept="image/*">
                                            <input type="hidden" name="current" value="<?php echo $myvataor; ?>"> -->
                                        </div>
                                        <button onclick="return verify();" type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="tel-repeater">Update Password</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form name="frm1" action="app/new-pw.php" method="POST" autocomplete="OFF">
                                        <div class="form-group col-12 mb-2">
                                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm new password">
                                        </div>
                                        <button onclick="return val_a();" type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Form control repeater section end -->
        </div>
    </div>
</div>
<!-- END: Content-->
<?php include 'footer.php'; ?>
<script>
    function verify() {
        var js_array = <?php echo json_encode($result); ?>;
        for (x = 0; x < js_array.length; x++) {
            if (frm.email.value == js_array[x]['email']) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'This email already exists, try another.',
                })
                return false;
            }
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
<script>
    function val_a() {
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