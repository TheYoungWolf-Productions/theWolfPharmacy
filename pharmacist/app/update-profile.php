<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {

  require_once('../../resources/config.php');
  //Users new email from the form.
  $myemail = $_POST['email'];
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Find user by email and replace its email with the new email.
    $stmt = $conn->prepare("UPDATE users SET email = :email where email= :myemail");
    $stmt->bindParam(':email', $myemail);
    $stmt->bindParam(':myemail', $_SESSION['email']);
    $stmt->execute();
    // Re set the sessions email
    $_SESSION['email'] = $myemail;
    $_SESSION['reply'] = "022";
    sleep(1);
    header("location:../account");
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
} else {
  header("location:../");
}
