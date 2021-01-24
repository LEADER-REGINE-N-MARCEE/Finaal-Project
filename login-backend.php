<?php
//start session
session_start();

include_once('DBUsrSearch.php');

$user = new User();

if(isset($_POST['login'])){
	$email = $user->escape_string($_POST['email']);
    $password = $user->escape_string($_POST['password']);
    

	$auth = $user->check_login($email, $password);

	if(!$auth){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:index.php');
	}
	else{
		$_SESSION['user'] = $auth;
		header('location:home.php');
	}
}
else{
	$_SESSION['message'] = 'You need to login first';
	header('location:index.php');
}
?>