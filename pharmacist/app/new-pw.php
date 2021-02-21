<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {

	require_once('../../resources/config.php');
	$new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE users SET hashkey = :hashkey where email= :myemail");
		$stmt->bindParam(':hashkey', $new_password);
		$stmt->bindParam(':myemail', $_SESSION['email']);
		$stmt->execute();
		$_SESSION['reply'] = "023";
		sleep(1);
		header("location:../account");
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
} else {
	header("location:../");
}
