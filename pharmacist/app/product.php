<?php
session_start();
// A function for logging on chrome console(debugging purposes)
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {
    require_once('../../resources/config.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //If user is adding a new product
        if (isset($_POST['btn_save'])) {
            $stmt = $conn->prepare("INSERT INTO `products`(`name`, `unit`, `batch`, `manufacturer_id`, `manufacture_date`, `expiry_date`, `import_date`, `taxing`, `category`, `barcode`, `shelf_number`, `comment`) VALUES (:name, :unit, :batch, :manufacturer_id, :manufacture_date, :expiry_date, :import_date, :taxing, :category, :barcode, :shelf_number, :comment)");
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':unit', $_POST['unit']);
            $stmt->bindParam(':batch', $_POST['batch']);
            $stmt->bindParam(':manufacturer_id', $_POST['mId']);
            $stmt->bindParam(':manufacture_date', $_POST['manufacture_date']);
            $stmt->bindParam(':expiry_date', $_POST['expiry_date']);
            $stmt->bindParam(':import_date', $_POST['import_date']);
            $stmt->bindParam(':taxing', $_POST['taxing']);
            $stmt->bindParam(':category', $_POST['category']);
            $stmt->bindParam(':shelf_number', $_POST['shelf_number']);
            $stmt->bindParam(':comment', $_POST['comment']);
            $stmt->bindParam(':barcode', $_POST['barcode']);
            $stmt->execute();
            // Find id of newly added product
            // Then using it, update the inventory table
            $stmtGetID = $conn->prepare("select id from products where name=:name and batch=:batch");
            $stmtGetID->bindParam(':name', $_POST['name']);
            $stmtGetID->bindParam(':batch', $_POST['batch']);
            $stmtGetID->execute();
            $result = $stmtGetID->fetch(PDO::FETCH_ASSOC);

            $stmt2 = $conn->prepare("INSERT INTO `inventory`(`product_id`, `supplier_id`, `quantity`, `price`) VALUES (:product_id, :supplier_id, :quantity, :price)");
            $stmt2->bindParam(':product_id', $result['id']);
            $stmt2->bindParam(':supplier_id', $_POST['sId']);
            $stmt2->bindParam(':quantity', $_POST['quantity']);
            $stmt2->bindParam(':price', $_POST['price']);
            $stmt2->execute();
            $_SESSION['reply'] = "003";
            header("location:../manage");
        }
        // If user has edited an already existing product
        if (isset($_POST['btn_edit'])) {
            $stmt = $conn->prepare("UPDATE `products` SET `name`=:name, `unit`=:unit, `batch`=:batch, `manufacturer_id`=:manufacturer_id, `manufacture_date`=:manufacture_date, `expiry_date`=:expiry_date, `import_date`=:import_date, `taxing`=:taxing, `category`=:category, `barcode`=:barcode, `shelf_number`=:shelf_number, `comment`=:comment where id=:id");
            console_log($_POST['id']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':unit', $_POST['unit']);
            $stmt->bindParam(':batch', $_POST['batch']);
            $stmt->bindParam(':manufacturer_id', $_POST['mId']);
            $stmt->bindParam(':manufacture_date', $_POST['manufacture_date']);
            $stmt->bindParam(':expiry_date', $_POST['expiry_date']);
            $stmt->bindParam(':import_date', $_POST['import_date']);
            $stmt->bindParam(':taxing', $_POST['taxing']);
            $stmt->bindParam(':category', $_POST['category']);
            $stmt->bindParam(':shelf_number', $_POST['shelf_number']);
            $stmt->bindParam(':comment', $_POST['comment']);
            $stmt->bindParam(':barcode', $_POST['barcode']);
            $stmt->execute();

            $stmt2 = $conn->prepare("UPDATE `inventory` SET `supplier_id`=:supplier_id, `quantity`=:quantity, `price`=:price where product_id=:id");
            $stmt2->bindParam(':id', $_POST['id']);
            $stmt2->bindParam(':supplier_id', $_POST['sId']);
            $stmt2->bindParam(':quantity', $_POST['quantity']);
            $stmt2->bindParam(':price', $_POST['price']);
            $stmt2->execute();
            $_SESSION['reply'] = "004";
            header("location:../manage");
        }
        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("update inventory set quantity = quantity - :quantity where product_id = :id");
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->bindParam(':quantity', $_GET['quantity']);
            $stmt->execute();
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {

    header("location:../");
}
