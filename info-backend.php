<?php
session_start();
include_once('addInfotoDB.php');

$info = new info();

$usrID = $_SESSION['user'];
$fullname = $info->escape_string($_POST['fullname']);
$flrnum = $info->escape_string($_POST['flrnum']);
$province = $info->escape_string($_POST['province']);
$municipality = $info->escape_string($_POST['municipality']);
$barangay = $info->escape_string($_POST['barangay']);
$mobilenum = $info->escape_string($_POST['mobilenum']);

$success = $info->insert( $usrID, $fullname, $flrnum, $province, $municipality, $barangay, $mobilenum);
if (!$success) {
    $_SESSION['message'] = 'There seems to be an error.';
    header('location:index.php');
} else {
    header('location:account.php');
}


?>
