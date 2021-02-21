<?php
require_once('../resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select p.id, p.name as name, unit, batch, manufacturer_id, m.name as mName, manufacture_date, expiry_date, import_date, taxing, category, shelf_number, comment, quantity, price, s.name as sName from products as p, manufacturers as m, inventory as i, suppliers as s where manufacturer_id=m.id and p.id=i.product_id and supplier_id=s.id;");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!-- DOM - jQuery events table -->
<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h4>Records of all medicines in stock</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                        <?php require_once('../public/assets/constants/check-reply.php'); ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dom-jQuery-events">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Batch No.</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Taxing</th>
                                        <th>Quantity</th>
                                        <th>Manufacturer</th>
                                        <th>Supplier</th>
                                        <th>Manufactured on</th>
                                        <th>Expires on</th>
                                        <th>Purchased on</th>
                                        <th>Location</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($result as $value) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['unit'] ?></td>
                                            <td><?= $value['batch'] ?></td>
                                            <td><?= $value['category'] ?></td>
                                            <td>Rs. <?= $value['price'] ?></td>
                                            <td><?= $value['taxing'] ?></td>
                                            <td><?= $value['quantity'] ?></td>
                                            <td><?= $value['mName'] ?></td>
                                            <td><?= $value['sName'] ?></td>
                                            <td><?= $value['manufacture_date'] ?></td>
                                            <td><?= $value['expiry_date'] ?></td>
                                            <td><?= $value['import_date'] ?></td>
                                            <td>Shelf <?= $value['shelf_number'] ?></td>
                                            <td><?= $value['comment'] ?></td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>