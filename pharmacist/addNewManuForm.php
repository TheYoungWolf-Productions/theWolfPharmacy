<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
?>
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("select * from manufacturers where id='" . $_GET['id'] . "'");
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
// function get_enum_values($table, $field)
// {
//     $stmt = $GLOBALS['conn']->query("SHOW COLUMNS FROM {$table} WHERE Field = 
//     '{$field}'");
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     $type = $result["Type"];
//     preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
//     $enum = explode("','", $matches[1]);
//     return $enum;
// }
// $enumUnit = get_enum_values('products', 'unit');
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
                        <form class="form-horizontal" action="app/manufacturer" method="post" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <?php if (isset($_GET['id'])) { ?>
                                        <div class="form-group" hidden>
                                            <h5>ID </h5>
                                            <div class="controls">
                                                <input type="text" name="id" class="form-control mb-1" placeholder="id" value=<?php echo $_GET['id'] ?>>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <h5>Name <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control mb-1" required placeholder="TheYoungWolf" data-validation-required-message="Manufacturer name is required" value=<?php echo getValue("name") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>License </h5>
                                        <div class="controls">
                                            <input type="text" name="license_number" class="form-control mb-1" placeholder="878-548814" value=<?php echo getValue("license_number"); ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <h5>Address </h5>
                                        <div class="controls">
                                            <textarea name="address" class="form-control mb-1" placeholder="Store #3, Street 30, H-12, Islamabad" rows="6"><?php echo getValue("address") ?></textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <?php if (isset($_GET['id'])) { ?>
                                            <button type="submit" name="btn_edit" id=<?= $_GET['id'] ?> class="btn btn-warning">Edit <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" name="btn_save" class="btn btn-success">Add <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } ?>
                                        <a href="manufacturers" class="btn btn-danger">Cancel <i class="la la-close position-right"></i></a>
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