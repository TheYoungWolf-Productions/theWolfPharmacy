<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
?>
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("select * from users where id='" . $_GET['id'] . "'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
// $stmt = $conn->prepare("SELECT id, name FROM manufacturers");
// $stmt->execute();
// $manufacturers = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $stmt = $conn->prepare("SELECT id, name FROM suppliers");
// $stmt->execute();
// $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
function getValue($p)
{
    if (isset($_GET['id'])) {
        return $GLOBALS['result'][$p];
    }
}
function get_enum_values($table, $field)
{
    $stmt = $GLOBALS['conn']->query("SHOW COLUMNS FROM {$table} WHERE Field = 
    '{$field}'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $type = $result["Type"];
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}
$enumRole = get_enum_values('users', 'role');
?>
<section class="input-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <form id="frm1" name="frm1" class="form-horizontal" action="app/user" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <?php if (isset($_GET['id'])) { ?>
                                        <div class="form-group" hidden>
                                            <h5>ID </h5>
                                            <div class="controls">
                                                <input type="text" name="id" class="form-control mb-1" placeholder="id" data-validation-required-message="Product name is required" value=<?php echo $_GET['id'] ?>>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <h5>Name <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control mb-1" required placeholder="TheYoungWolf" data-validation-required-message="Username is required" value=<?php echo getValue("name") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Email <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" autocomplete="off" name="email" class="form-control mb-1" email required data-validation-required-message="Email address is required" placeholder="abc@xyz.com" value=<?php echo getValue("email"); ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Role <span class="required">*</span></h5>
                                        <div class="controls">
                                            <select name="role" id="selectRole" class="form-control mb-1" required>
                                                <option value="">Select unit</option>
                                                <?php foreach ($enumRole as $value) {
                                                    if ($value == getValue('role')) { ?>
                                                        <option selected value="<?= $value ?>"><?= $value ?>&lrm;</option>
                                                    <?php } else { ?>
                                                        <option value="<?= $value ?>"><?= $value ?>&lrm;</option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <?php if (isset($_GET['id'])) { ?>
                                        <h5>Select only if you wish to change the password.</h5>
                                        <a id="toggle" class="btn btn-primary mb-2" data-toggle="collapse" href="#collapsePassword" role="button" aria-expanded="false" aria-controls="collapsePassword">
                                            Change Password?
                                        </a>
                                        <div id="collapsePassword" class="collapse">
                                            <div class="form-group col-12 mb-2">
                                                <h5>New password <span class="required">*</span></h5>
                                                <input id="in1" type="password" disabled class="form-control" name="password" placeholder="Enter new password" autocomplete="off">
                                                <input id="in1Hidden" type="password" hidden class="form-control" name="password" value="" placeholder="Enter new password" autocomplete="off">
                                            </div>
                                            <div class="form-group col-12 mb-2">
                                                <h5>Confirm password <span class="required">*</span></h5>
                                                <input id="in2" type="password" disabled class="form-control" name="confirmpassword" placeholder="Confirm new password" autocomplete="off">
                                                <input id="in2Hidden" type="password" hidden class="form-control" name="confirmpassword" value="" placeholder="Enter new password" autocomplete="off">
                                            </div>
                                            <!-- <button onclick="return val_a();" type="submit" class="btn btn-primary btn-block">Save Changes</button> -->
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group col-12 mb-2">
                                            <h5>Password <span class="required">*</span></h5>
                                            <input type="password" class="form-control" required name="password" placeholder="Enter new password">
                                        </div>
                                        <div class="form-group col-12 mb-2">
                                            <h5>Confirm Password <span class="required">*</span></h5>
                                            <input type="password" class="form-control" required name="confirmpassword" placeholder="Confirm new password">
                                        </div>
                                    <?php } ?>
                                    <div class="text-right">
                                        <?php if (isset($_GET['id'])) { ?>
                                            <button onclick="return verifyEdit();" type="submit" name="btn_edit" id=<?= $_GET['id'] ?> class="btn btn-warning">Edit <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } else { ?>
                                            <button onclick="return verifyAdd();" type="submit" name="btn_save" class="btn btn-success">Add <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } ?>
                                        <a href="users" class="btn btn-danger">Cancel <i class="la la-close position-right"></i></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>