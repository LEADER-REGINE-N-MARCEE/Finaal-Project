<?php
session_start();
include_once('UserDB.php');
$user = new User();

$usrID = $_SESSION['user'];
$fullname = $user->escape_string($_POST['fullname']);
$flrnum = $user->escape_string($_POST['flrnum']);
$province = $user->escape_string($_POST['province']);
$municipality = $user->escape_string($_POST['municipality']);
$barangay = $user->escape_string($_POST['barangay']);
$mobilenum = $user->escape_string($_POST['mobilenum']);

$success = $user->insertInfo( $usrID, $fullname, $flrnum, $province, $municipality, $barangay, $mobilenum);
if (!$success) {
    $_SESSION['message'] = 'There seems to be an error.';
    header('location:index.php');
} else {
    header('location:account.php');
}


?>
