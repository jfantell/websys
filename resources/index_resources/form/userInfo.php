<?php

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "websyslab7";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "INSERT INTO contact_me (name, email, message)
	    VALUES ('$name', '$email', '$message')";
	    // use exec() because no results are returned
	    $conn->exec($sql);
	    echo "New record created successfully";
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;
?>