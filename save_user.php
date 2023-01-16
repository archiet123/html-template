<?php
	//starting the session
	session_start();
 
	//including the database connection
	require_once 'conn.php';
	
 

	// Setting variables
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$second_password = $_POST['second_password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	if ($username == "" OR $password == "" OR $second_password == "" OR $firstname == "" OR $lastname== ""){
		$_SESSION['empty'] = "One or more of the fields are empty, please enter all the required information.";
			//redirecting to the index.php 
			header('location: register.php');
			exit();	
	} 

	if ($password != $second_password){
		
		$_SESSION['pass_error'] = "Passwords do not match";
		header('location: register.php');
	}else{
		$pass = password_hash($password, PASSWORD_DEFAULT);
		
		// Insertion Query
		
		$query = "INSERT INTO `Users` (Username, Password, Firstname, Lastname) VALUES(:username, :password, :firstname, :lastname)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $pass);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		

		// Check if the execution of query is success
		if($stmt->execute()){
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Successfully created an account";
			//redirecting to the index.php 
			header('location: index.php');			
		}else{
			echo "not working";
			header('location: register.php');	
		}
		
	}
?>