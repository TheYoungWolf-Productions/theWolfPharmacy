<?php
session_start();
// A function for logging on chrome console(debugging purposes)
// function console_log($output, $with_script_tags = true)
// {
// 	$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
// 		');';
// 	if ($with_script_tags) {
// 		$js_code = '<script>' . $js_code . '</script>';
// 	}
// 	echo $js_code;
// }
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {
	require_once('../../resources/config.php');
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (isset($_POST['btn_save'])) {
			$stmt = $conn->prepare("INSERT INTO `manufacturers` (`name`,`address`, `license_number`) VALUES (:name, :address, :license_number)");
			$stmt->bindParam(':name', $_POST['name']);
			$stmt->bindParam(':address', $_POST['address']);
			$stmt->bindParam(':license_number', $_POST['license_number']);
			$stmt->execute();
			$_SESSION['reply'] = "003";
			header("location:../manufacturers");
		}

		if (isset($_POST['btn_edit'])) {
			$stmt = $conn->prepare("UPDATE manufacturers SET name=:name,address=:address, license_number=:license_number WHERE id=:id");
			$stmt->bindParam(':name', $_POST['name']);
			$stmt->bindParam(':address', $_POST['address']);
			$stmt->bindParam(':license_number', $_POST['license_number']);
			$stmt->bindParam(':id', $_POST['id']);
			$stmt->execute();
			$_SESSION['reply'] = "004";
			header("location:../manufacturers");
		}

		if (isset($_GET['id'])) {
			$stmt = $conn->prepare("select count(manufacturer_id) as count from products where manufacturer_id = :id");
			$stmt->bindParam(':id', $_GET['id']);
			$stmt->execute();
			$stmt2 = $conn->prepare("DELETE from manufacturers where id=:id");
			$stmt2->bindParam(':id', $_GET['id']);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($result['count'] > 0) {
				throw new PDOException("There exists products of this manufacturer in stock");
			} else {
				$stmt2->execute();
			}
		}
	} catch (PDOException $e) {
		header('HTTP/1.1 500 Internal Server Booboo');
		header('Content-Type: application/json; charset=UTF-8');
		die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
	}
} else {
	header("location:../");
}
