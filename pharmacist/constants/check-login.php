<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "Pharmacist") {
    $myname = '';
    $myemail = $_SESSION['email'];
    $myvataor = $_SESSION['avator'];
    $myname = $_SESSION['name'];
} else {
    header("location:../");
}
