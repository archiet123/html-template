//file is basically useless as there is no databaes linked

<?php
	//starting the session
	session_start();
	//including the database connection
	require_once 'conn.php';
	
    // Setting variables
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    //gets password and hashes it ready to be compared.    

    //Select query for getting already hashed passwords in database and comparing them to a newly hashed password
    $query = "SELECT * FROM `Users` WHERE `Username` = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch();

    if (password_verify($password, ($row[2]))){
        $_SESSION["user"] = $username;
        $_SESSION["user_id"] = ($row[0]);
        header('location:home.php');
        
        exit();
    }else{
        $_SESSION['error'] = "Invalid username or password";
        echo "data did not match";
        header('location:index.php');
        exit();
    }
         
	
?>