<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
?>
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("select p.id, p.name as name, unit, batch, manufacturer_id, m.name as mName, manufacture_date, expiry_date, import_date, taxing, category, shelf_number, barcode, comment, quantity, price, s.name as sName from products as p, manufacturers as m, inventory as i, suppliers as s where manufacturer_id=m.id and p.id=i.product_id and supplier_id=s.id and p.id='" . $_GET['id'] . "'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
$stmt = $conn->prepare("SELECT id, name FROM manufacturers");
$stmt->execute();
$manufacturers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->prepare("SELECT id, name FROM suppliers");
$stmt->execute();
$suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
$enumUnit = get_enum_values('products', 'unit');
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
                        <form class="form-horizontal" action="app/product" method="post" enctype="multipart/form-data" novalidate>
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
                                            <input type="text" name="name" class="form-control mb-1" required placeholder="Panadol" data-validation-required-message="Product name is required" value=<?php echo getValue("name") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Unit <span class="required">*</span></h5>
                                        <div class="controls">
                                            <select name="unit" id="selectUnit" class="form-control mb-1" required>
                                                <option value="">Select unit</option>
                                                <?php foreach ($enumUnit as $value) {
                                                    if ($value == getValue('unit')) { ?>
                                                        <option selected value="<?= $value ?>"><?= $value ?>&lrm;</option>
                                                    <?php } else { ?>
                                                        <option value="<?= $value ?>"><?= $value ?>&lrm;</option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Batch No. </h5>
                                        <div class="controls">
                                            <input type="text" name="batch" class="form-control mb-1" required data-validation-required-message="Batch number is required" placeholder="b200x3" value=<?php echo getValue("batch"); ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category </h5>
                                        <div class="controls">
                                            <input type="text" name="category" class="form-control mb-1" placeholder="Tablets" value=<?php echo getValue("category") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Shelf No. </h5>
                                        <div class="controls">
                                            <input type="text" class="form-control mb-1" name="shelf_number" placeholder="6" value=<?php echo getValue("shelf_number") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Purchased on <span class="required">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="date" name="import_date" class="form-control mb-1" data-validation-required-message="Purchase date is required" value=<?php echo getValue("import_date") ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Expires on <span class="required">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="date" name="expiry_date" class="form-control mb-1" data-validation-required-message="Expire date is required" value=<?php echo getValue("expiry_date") ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Manufactured on <span class="required">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="date" name="manufacture_date" class="form-control mb-1" data-validation-required-message="Manufacture date is required" value=<?php echo getValue("manufacture_date") ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <h5>Quantity <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="quantity" class="form-control mb-1" required data-validation-required-message="Quantity is required" min="1" placeholder="20" value=<?php echo getValue("quantity") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sale price <span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="number" name="price" class="form-control mb-1" required data-validation-required-message="Price is required" min="0" placeholder="25" value=<?php echo getValue("price") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Manufacturer Name <span class="required">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="mId" class="form-control mb-1 select2" required>
                                                    <option value="">Select manufacturer</option>
                                                    <?php foreach ($manufacturers as $value) {
                                                        if ($value['name'] == getValue('mName')) { ?>
                                                            <option selected value="<?= $value['id'] ?>"><?= $value['name'] ?>&lrm;</option>
                                                        <?php } else { ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?>&lrm;</option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Supplier Name <span class="required">*</span></h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <select name="sId" class="form-control mb-1 select2" required>
                                                    <option value="">Select supplier</option>
                                                    <?php foreach ($suppliers as $value) {
                                                        if (getValue('sName') == $value['name']) { ?>
                                                            <option selected value="<?= $value['id'] ?>"><?= $value['name'] ?>&lrm;</option>
                                                        <?php } else { ?>
                                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?>&lrm;</option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Taxing</h5>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input type="number" name="taxing" class="form-control" placeholder="0.20" value=<?php echo getValue("taxing") ?> />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Barcode </h5>
                                        <div class="controls">
                                            <input type="text" name="barcode" class="form-control mb-1" placeholder="874548455" value=<?php echo getValue("barcode") ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Comments </h5>
                                        <div class="controls">
                                            <textarea name="comment" class="form-control mb-1" placeholder="Special comments" rows="8"><?php echo getValue("comment") ?></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <h5>Image upload </h5>
                                        <div class="controls">
                                            <input type="file" name="image">
                                        </div>
                                    </div> -->
                                    <div class="text-right">
                                        <?php if (isset($_GET['id'])) { ?>
                                            <button type="submit" name="btn_edit" id=<?= $_GET['id'] ?> class="btn btn-warning">Edit <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } else { ?>
                                            <button type="submit" name="btn_save" class="btn btn-success">Add <i class="la la-thumbs-o-up position-right"></i></button>
                                        <?php } ?>
                                        <a href="manage" class="btn btn-danger">Cancel <i class="la la-close position-right"></i></a>
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