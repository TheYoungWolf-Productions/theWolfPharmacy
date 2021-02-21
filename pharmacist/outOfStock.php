<?php require_once('../resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select products.id, products.name, batch, import_date, expiry_date, quantity, suppliers.name as 'supplier' from products, inventory, suppliers where products.id=inventory.product_id and quantity<100 and supplier_id=suppliers.id order by quantity");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!-- DOM - jQuery events table -->
<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h2 class="card-title"><span class="badge badge-info" style="font-size: 2rem;"><strong>Out of Stock</strong></span></h2>
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
                                        <th>Batch</th>
                                        <th>Purchased on</th>
                                        <th>Quantity</th>
                                        <th>Expiry</th>
                                        <th>Supplier</th>
                                        <!-- <th>Control</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($result as $value) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['batch'] ?></td>
                                            <td><?= $value['import_date'] ?></td>
                                            <td>
                                                <?php
                                                if ($value['quantity'] > 0) {
                                                    echo "<span class='badge badge-warning'>Only {$value['quantity']} left";
                                                } else {
                                                    echo "<span class='badge badge-danger'>OUT OF STOCK";
                                                }
                                                ?>
                                                </span>
                                            </td>
                                            <td><?= $value['expiry_date'] ?></td>
                                            <td><?= $value['supplier'] ?></td>
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