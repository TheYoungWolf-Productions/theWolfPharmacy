<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {
    require_once('../../resources/config.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['btn_save'])) {
            $stmt = $conn->prepare("INSERT INTO `suppliers` (`name`,`address`) VALUES (:name, :address)");
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':address', $_POST['address']);
            $stmt->execute();
            $_SESSION['reply'] = "003";
            header("location:../suppliers");
        }

        if (isset($_POST['btn_edit'])) {
            $stmt = $conn->prepare("UPDATE suppliers SET name=:name,address=:address WHERE id=:id");
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':address', $_POST['address']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            $_SESSION['reply'] = "004";
            header("location:../suppliers");
        }

        if (isset($_GET['id'])) {
            $stmt = $conn->prepare("select count(supplier_id) as count from inventory where supplier_id = :id");
            $stmt->bindParam(':id', $_GET['id']);
            $stmt->execute();
            $stmt2 = $conn->prepare("DELETE from suppliers where id=:id");
            $stmt2->bindParam(':id', $_GET['id']);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result['count'] > 0) {
                throw new PDOException("There exists stock of this supplier in your inventory");
            } else {
                $stmt2->execute();
            }
        }
    } catch (PDOException $e) {
        header('HTTP/1.1 500 Internal Server Custom error thrown');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
    }
} else {
    header("location:../");
}
