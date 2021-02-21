<?php
session_start();
//configuration file
require_once('../../../resources/config.php');

$email_address = $_POST['email'];
$login = $_POST['password'];

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SELECT id, name, email, role, hashkey FROM users WHERE email = :email ");
	$stmt->bindParam(':email', $email_address);
	$stmt->execute();
	$result = $stmt->fetchAll();
	//getting number of records found
	$rec = count($result);

	if ($rec > 0) {
		foreach ($result as $row) {
			$id = $row['id'];
			$role = $row['role'];
			$avator = '70520.png';
			$name = $row['name'];
		}
		switch ($role) {
			case 'Admin':
				# verifying password
				if (password_verify($login, $row['hashkey'])) {
					$currency = $conn->prepare("SELECT currency FROM settings WHERE id='1'");
					$currency->execute();
					$result1 = $currency->fetch(PDO::FETCH_ASSOC);
					$_SESSION['currency'] = $result1['currency'];
					admin_login();
				} else {
					$_SESSION['reply'] = "001";
					header("location:../../../");
				}
				break;
			case 'Pharmacist':
				if (password_verify($login, $row['hashkey'])) {
					$currency = $conn->prepare("SELECT currency FROM settings WHERE id='1'");
					$currency->execute();
					$result1 = $currency->fetch(PDO::FETCH_ASSOC);
					$_SESSION['currency'] = $result1['currency'];
					pharmacist_login();
				} else {
					$_SESSION['reply'] = "001";
					header("location:../../../");
				}
				break;
			case 'Cashier':
				if (password_verify($login, $row['hashkey'])) {
					$currency = $conn->prepare("SELECT currency FROM settings WHERE id='1'");
					$currency->execute();
					$result1 = $currency->fetch(PDO::FETCH_ASSOC);
					$_SESSION['currency'] = $result1['currency'];
					cashier_login();
				} else {
					$_SESSION['reply'] = "001";
					header("location:../../../");
				}
				break;
		}
	} else {
		$_SESSION['reply'] = "001";
		header("location:../../../");
	}
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

function admin_login()
{
	$_SESSION['id'] = $GLOBALS['id'];
	$_SESSION['name'] = $GLOBALS['name'];
	$_SESSION['logged'] = "1";
	$_SESSION['role'] = "Admin";
	$_SESSION['email'] = $GLOBALS['email_address'];
	$_SESSION['avator'] = $GLOBALS['avator'];
	header("location:../../../admin/index.php");
}

function pharmacist_login()
{
	$_SESSION['id'] = $GLOBALS['id'];
	$_SESSION['name'] = $GLOBALS['name'];
	$_SESSION['logged'] = "1";
	$_SESSION['role'] = "Pharmacist";
	$_SESSION['email'] = $GLOBALS['email_address'];
	$_SESSION['avator'] = $GLOBALS['avator'];
	try {
		$servername = $GLOBALS['servername'];
		$dbname = $GLOBALS['dbname'];
		$username = $GLOBALS['username'];
		$password = $GLOBALS['password'];
		require_once('../../../resources/config.php');
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $GLOBALS['email_address']);
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach ($result as $row) {
			$_SESSION['id'] = $row['id'];
		}
		header("location:../../../pharmacist/index.php");
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

function cashier_login()
{
	$_SESSION['id'] = $GLOBALS['id'];
	$_SESSION['name'] = $GLOBALS['name'];
	$_SESSION['logged'] = "1";
	$_SESSION['role'] = "Cashier";
	$_SESSION['email'] = $GLOBALS['email_address'];
	$_SESSION['avator'] = $GLOBALS['avator'];
	try {
		$servername = $GLOBALS['servername'];
		$dbname = $GLOBALS['dbname'];
		$username = $GLOBALS['username'];
		$password = $GLOBALS['password'];
		require_once('../../../resources/config.php');
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindParam(':email', $GLOBALS['email_address']);
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach ($result as $row) {
			$_SESSION['id'] = $row['id'];
		}
		header("location:../../../cashier/index.php");
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}
