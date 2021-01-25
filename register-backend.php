<?php
    session_start();
    include_once('addUsertoDB.php');

    $signup = new signup();

	$fname = $signup->escape_string($_POST['fname']);
    $lname = $signup->escape_string($_POST['lname']);
    $email = $signup->escape_string($_POST['email']);
	$password = $signup->escape_string($_POST['password']);
	$password2 = $signup->escape_string($_POST['password2']);

	$check = $signup->emailCheck($email);
	if($check == true){
		$_SESSION['message'] = 'Email already exists!';
    	header('location:register.php');
	}
	else{
		if ($password == $password2)
		{
			$success = $signup->insert($fname, $lname, $email, $password);
			if(!$success){
				$_SESSION['message'] = 'There seems to be an error.';
				header('location:register.php');
			}
			else{
				header('location:login.php');
			}
		}

		else
		{
			$_SESSION['message'] = 'Password does not match';
		}

	}

	

?>