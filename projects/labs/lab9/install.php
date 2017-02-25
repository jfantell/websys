<?php

$config = array(
   'DB_HOST'     => 'localhost',
   'DB_USERNAME' => 'root',
   'DB_PASSWORD' => '',
);

//Create database if does not exist
try {
    $conn = new PDO("mysql:host=localhost;dbname=", $config['DB_USERNAME'], $config['DB_PASSWORD']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $dbname = "`".str_replace("`","``","fantej_websyslab9")."`";
	  $conn->query("CREATE DATABASE IF NOT EXISTS fantej_websyslab9");
	  $conn->query("use fantej_websyslab9");

    echo ">> Database `fantej_websyslab9` created successfully<br>";
    }
catch(PDOException $e)
    {
    echo $e->getMessage() . "<br>";
    }

//Create courses table if does not exist
try {
   	//Handling
     $sql ="CREATE TABLE IF NOT EXISTS `courses`(
	    `crn` int(11) NOT NULL PRIMARY KEY,
	  	`prefix` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
	  	`number` smallint(4) NOT NULL,
	  	`title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
	  	`section` int(2) NOT NULL,
	  	`year` int(4) NOT NULL)";
     $conn->exec($sql);
     echo ">> Created `courses` Table <br>";

} catch(PDOException $e) {
     echo $e->getMessage() . "<br>";//Remove or change message in production code
}

//Create students table if does not exist
try {
   	//Handling
     $sql ="CREATE TABLE IF NOT EXISTS `students` (
	  `rin` int(9) NOT NULL PRIMARY KEY,
	  `rcsID` char(7) COLLATE utf8_unicode_ci DEFAULT NULL,
	  `first name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `last name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `phone` int(10) DEFAULT NULL,
	  `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	  `st` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
	  `zip` int(5) NOT NULL)";
     $conn->exec($sql);
     echo ">> Created `students` Table. <br>";


} catch(PDOException $e) {
    echo $e->getMessage() . "<br>";//Remove or change message in production code
}

//Create grades table if does not exist
try {
   	//Handling
     $sql ="CREATE TABLE IF NOT EXISTS `grades` (
	  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  `crn` int(5) NOT NULL,
	  `rin` int(9) NOT NULL,
	  `grade` int(3) NOT NULL,
	  CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`crn`) REFERENCES `courses` (`crn`),
	  CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`rin`) REFERENCES `students` (`rin`))";
     $conn->exec($sql);
     echo ">> Created `grades` Table. <br>";

} catch(PDOException $e) {
    echo $e->getMessage() . "<br>";//Remove or change message in production code
}

$conn = null;

?>

