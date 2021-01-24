<?php
    session_start();
    include_once('addUsertoDB.php');

    $signup = new signup();

	$fname = $signup->escape_string($_POST['fname']);
    $lname = $signup->escape_string($_POST['lname']);
    $email = $signup->escape_string($_POST['email']);
    $password = $signup->escape_string($_POST['password']);

    

	$success = $signup->insert($fname, $lname, $email, $password);

	if(!$success){
		$_SESSION['message'] = 'Invalid username or password';
    	header('location:index.php');
	}
	else{

		header('location:login.php');
	}
?>