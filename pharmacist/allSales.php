<?php
require_once('../resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select sales.id, invoice_number, sale_date, total_sale, discount, comment, role, u.name from sales, users as u where user_id=u.id;");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $conn->prepare("select sale_id, p.name, quantity_sold, price_each from saledetails, products as p where product_id=p.id;");
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- DOM - jQuery events table -->
<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h4>All sale records</h4>
                    <!-- <h4 class="card-title"><a href="addSale" class="btn btn-primary "><i class="la la-plus"></i>Add New</a></h4> -->
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
                            <!-- table-bordered  dom-jQuery-events-->
                            <table class="table display table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice number</th>
                                        <th>Products</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Total Sale</th>
                                        <th>Sold by</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <?php
                                    $i = 1;
                                    foreach ($result as $value) { ?>
                                        <tr>
                                            <?php
                                            $stmt3 = $conn->prepare("select count(*) as count from saledetails where sale_id=:id");
                                            $stmt3->bindParam("id", $value['id']);
                                            $stmt3->execute();
                                            $result3 = $stmt3->fetch(PDO::FETCH_ASSOC);
                                            $counter = 0;
                                            ?>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $i ?></td>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $value['invoice_number'] ?></td>
                                            <?php foreach ($result2 as $value2) {
                                                if ($value['id'] == $value2['sale_id']) {
                                                    if ($GLOBALS['counter'] == 0) { ?>
                                                        <td><?= $value2['name'] ?></td>
                                                        <td><?= $value2['quantity_sold'] ?></td>
                                                        <td><?= $value2['price_each'] ?></td>
                                                        <?php $GLOBALS['counter'] = $GLOBALS['counter'] + 1; ?>
                                                    <?php } else { ?>
                                                        <script>
                                                            // manualHtml()
                                                            var record = <?php echo json_encode($value2); ?>;
                                                            var nodeTr = document.createElement("TR");
                                                            var nodeTd1 = document.createElement("TD");
                                                            var textTd1 = document.createTextNode(record['name']);
                                                            var nodeTd2 = document.createElement("TD");
                                                            var textTd2 = document.createTextNode(record['quantity_sold']);
                                                            var nodeTd3 = document.createElement("TD");
                                                            var textTd3 = document.createTextNode(record['price_each']);
                                                            nodeTd1.appendChild(textTd1);
                                                            nodeTd2.appendChild(textTd2);
                                                            nodeTd3.appendChild(textTd3);
                                                            nodeTr.appendChild(nodeTd1);
                                                            nodeTr.appendChild(nodeTd2);
                                                            nodeTr.appendChild(nodeTd3);
                                                            document.getElementById("tableBody").appendChild(nodeTr);
                                                            // $(document).ready(function() {
                                                            //     $("#tableBody").append(string);
                                                            // });
                                                            // console.log(record);
                                                        </script>
                                            <?php }
                                                }
                                            } ?>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $value['discount'] ?></td>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $value['total_sale'] ?></td>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $value['name'] ?></td>
                                            <td rowspan="<?= $result3['count'] ?>"><?= $value['comment'] ?></td>
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