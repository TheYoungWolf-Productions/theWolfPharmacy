<?php
require_once('../resources/config.php');
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("select id, name, address from suppliers");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!-- DOM - jQuery events table -->
<section id="dom">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header pt-1 pb-0">
                    <h4 class="card-title"><a href="addSupplier" class="btn btn-primary "><i class="la la-plus"></i>Add New</a></h4>
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
                                        <th>Address</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($result as $value) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $value['name'] ?></td>
                                            <td><?= $value['address'] ?></td>
                                            <td>
                                                <a title="Edit" href="addSupplier?id=<?= $value['id'] ?>" class="btn btn-icon btn-primary mr-1 mb-1"><i class="la la-edit"></i></a>
                                                <button type="button" class="btn btn-icon btn-danger mr-1 mb-1 cancel-button" id="<?= $value['id'] ?>"><i class="la la-trash"></i></button>
                                            </td>
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