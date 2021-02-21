<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Admin") {

	require_once('../../resources/config.php');

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if (isset($_POST['btn_save'])) {
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$stmt = $conn->prepare("INSERT INTO `users` (`name`, `email`, `role`, `hashkey`) VALUES (:name, :email, :role, :hashkey);");
			$stmt->bindParam(':name', $_POST['name']);
			$stmt->bindParam(':email', $_POST['email']);
			$stmt->bindParam(':role', $_POST['role']);
			$stmt->bindParam(':hashkey', $password);
			$stmt->execute();

			$_SESSION['reply'] = "003";
			header("location:../users");
		}

		if (isset($_POST['btn_edit'])) {
			if ($_POST['password'] == "" || $_POST['confirmpassword'] == "") {
				$stmt = $conn->prepare("UPDATE users SET name=:name, email=:email, role=:role where id=:id");
				$stmt->bindParam("id", $_POST['id']);
				$stmt->bindParam("name", $_POST['name']);
				$stmt->bindParam("email", $_POST['email']);
				$stmt->bindParam("role", $_POST['role']);
				$stmt->execute();
				if ($_POST['id'] === $_SESSION['id']) {
					$_SESSION['name'] = $_POST['name'];
					$_SESSION['email'] = $_POST['email'];
					// session_reset();
				}
				$_SESSION['reply'] = "004";
				sleep(1);
				header("location:../users");
			} else {
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$stmt = $conn->prepare("UPDATE users SET name=:name, email=:email, role=:role, hashkey=:hashkey where id=:id");
				$stmt->bindParam("id", $_POST['id']);
				$stmt->bindParam("name", $_POST['name']);
				$stmt->bindParam("email", $_POST['email']);
				$stmt->bindParam("role", $_POST['role']);
				$stmt->bindParam("hashkey", $password);
				$stmt->execute();
				$_SESSION['reply'] = "004";
				// sleep(1);
				header("location:../users");
			}
		}
		if (isset($_GET['id'])) {
			$stmt = $conn->prepare("UPDATE users SET hashkey=NULL where id=:id");
			$stmt->bindParam(':id', $_GET['id']);
			$stmt->execute();
		}
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
} else {

	header("location:../");
}
