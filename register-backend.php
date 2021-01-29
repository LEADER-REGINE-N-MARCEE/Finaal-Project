<?php
    session_start();
    include_once('UserDB.php');
    $user = new User();

	$fname = $user->escape_string($_POST['fname']);
    $lname = $user->escape_string($_POST['lname']);
    $email = $user->escape_string($_POST['email']);
    $password = $user->escape_string($_POST['password']);

	$check = $user->emailCheck($email);
	if($check == true){
		$_SESSION['message'] = 'Email already exists!';
    	header('location:register.php');
	}
	else{
		$success = $user->insert($fname, $lname, $email, $password);
		if(!$success){
			$_SESSION['message'] = 'There seems to be an error.';
			header('location:register.php');
		}
		else{
			header('location:login.php');
		}

	}

	

?>