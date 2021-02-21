<?php require_once('../resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select products.id, products.name, batch, import_date, expiry_date, quantity, suppliers.name as 'supplier' from products, inventory, suppliers where products.id=inventory.product_id and supplier_id=suppliers.id and DATEDIFF(expiry_date, CURDATE()) < 15  order by expiry_date");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!-- DOM - jQuery events table -->
<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h2 class="card-title"><span class="badge badge-warning" style="font-size: 2rem;"><strong>Expired</strong></span></h2>
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
                                        <th>Status</th>
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
                                            <td><?= $value['quantity'] ?></td>
                                            <td>
                                                <?php
                                                $today = date_create(date('Y-m-d'));
                                                $expDate = $value['expiry_date'];
                                                $futureDate = date_create(strtotime($expDate . '+ 35 days'));
                                                $expDate = date_create($value['expiry_date']);
                                                if ($expDate < $today && $today < $futureDate) {
                                                    $dateDiff = date_diff($expDate, $today);
                                                    $daysAgo = $dateDiff->format("%a");
                                                    // echo (gettype($daysAgo));
                                                    echo "<span class='badge badge-danger'>Expired {$daysAgo} days ago</span>";
                                                } elseif ($today < $expDate) {
                                                    $dateDiff = date_diff($today, $expDate);
                                                    $daysLeft = $dateDiff->format("%a");
                                                    if (intval($daysLeft) < 35) {
                                                        echo "<span class='badge badge-warning'>Expires in {$daysLeft} days</span>";
                                                    }
                                                } elseif ($expDate < $today && $today > $futureDate) {
                                                    $dateDiff = date_diff($expDate, $today);
                                                    $daysAgo = $dateDiff->format("%a");
                                                    // echo (gettype($daysAgo));
                                                    echo "<span class='badge badge-danger'>Expired {$daysAgo} days ago</span>";
                                                } else {
                                                    echo "<span class='badge badge-danger'>Expires today</span>";
                                                }
                                                ?>

                                            </td>
                                            <td><?= $value['expiry_date'] ?></td>
                                            <td><?= $value['supplier'] ?></td>
                                            <!-- <td>
                                                <a title="Edit" href="addcategory?id=<?= $value['id'] ?>" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                                                <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" id="<?= $value['id'] ?>"><i class="la la-trash"></i></button>
                                            </td> -->
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