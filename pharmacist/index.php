<?php
require_once('../resources/config.php');
require_once('constants/check-login.php');
require_once('constants/fetch-my-info.php');
include('header.php');
?>
<?php
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $stmt = $conn->prepare("select sum(quantity) as Sum from inventory");
    $stmt->execute();
    $resultStock = $stmt->fetch(PDO::FETCH_ASSOC);
    $sumStock = $resultStock['Sum'];
    $stmt2 = $conn->prepare("select sum(total_sale) as Sum from sales where DATEDIFF(CURDATE(), sale_date) BETWEEN 0 and 30");
    $stmt2->execute();
    $resultStock = $stmt2->fetch(PDO::FETCH_ASSOC);
    $sumSales = $resultStock['Sum'];
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<div class='app-content content'>
    <div class="content-wrapper">
        <div class="content-header row mt-1 mb-3">
            <div class="content-header col-sm-12 col-md-3">
                <div class="card text-white bg-secondary mb-2">
                    <div class="card-header text-center">AVAILABLE STOCK</div>
                    <div class="card-body pb-1 pt-0">
                        <h1 class="display-3 text-center"><?php echo $sumStock ?></h1>
                    </div>
                </div>
            </div>
            <div class="content-headercol-sm-12 col-md-6 mx-auto my-auto text-center">
                <img src="../public/assets/uploads/settings/logo-216.png" style="width: 180px; height: 180px; height: auto; padding: 3px;">
                <h1 class="display-4">
                    Welcome <?php print $_SESSION['name'] . "!"; ?>
                </h1>
            </div>
            <div class="content-header col-sm-12 col-md-3">
                <div class="card text-white bg-success mb-2">
                    <div class="card-header text-center">SALES</div>
                    <div class="card-body pb-1 pt-0">
                        <h1 class="display-3 text-center"><?php echo intVal($sumSales) ?></h1>
                    </div>
                </div>
            </div>
            <div class='content-body w-100' id='out'>
                <?php include 'outOfStock.php'; ?>
            </div>
            <div id="exp" class="content-body w-100">
                <?php include 'expired.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script>
        $(document).ready(function() {
            // handle links with @href started with '#' only
            $(document).on('click', 'a[href^="#"]', function(e) {
                // target element id
                var id = $(this).attr('href');
                // target element
                var $id = $(id);
                if ($id.length === 0) {
                    return;
                }
                // prevent standard hash navigation (avoid blinking in IE)
                e.preventDefault();

                // top position relative to the document
                var pos = $id.offset().top;

                // animated top scrolling
                $('body, html').animate({
                    scrollTop: pos
                });
            });
        })
    </script>