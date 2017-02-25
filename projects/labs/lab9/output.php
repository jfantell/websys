<?php

try{
		require_once 'index.php';
		$config = array(
		   'DB_HOST'     => 'localhost',
		   'DB_USERNAME' => 'root',
		   'DB_PASSWORD' => '',
		);

		$conn = new PDO("mysql:host=localhost;dbname=fantej_websyslab9", $config['DB_USERNAME'], $config['DB_PASSWORD']);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if($selected_val == 3){
			//get all students by alphebetical name, last name then first name
			$stmt = $conn->prepare("SELECT `first name`, `last name` FROM `students` ORDER BY `last name` ASC, `first name` ASC;");
			$stmt->execute();

			//fetch returns an array of all students (first name and last name)
			$result = $stmt->fetchAll();

			//iterate through the array, echo the output
			echo "<strong>Students (Sorted alphabetically by last name, then first name)</strong> <br><br>";
			foreach($result as $r) {
				echo $r['first name'] . " " . $r['last name'] . "<br>";
			}

		}	
		else if($selected_val == 4){
			//list counts of all students in categories
			echo "<strong>Grade Count Distribution</strong> <br>";
			//count number of students with grades between 90 and 100
			//output the count
			$stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 90 AND 100");
			$stmt->execute();
			$result = $stmt->fetch();
			echo "<br><em><u>90-100:</u></em><br>";
			echo $result[0];

			//count number of students with grades between 80 and 89
			//output the count
			$stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 80 AND 89");
			$stmt->execute();
			$result = $stmt->fetch();
			echo "<br> <em><u>80-89:</u></em> <br>";
			echo $result[0];

			$stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 70 AND 79");
			$stmt->execute();
			$result = $stmt->fetch();
			echo "<br><em><u>70-79:</u></em><br>";
			echo $result[0];

			$stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` BETWEEN 65 AND 69");
			$stmt->execute();
			$result = $stmt->fetch();
			echo "<br><em><u>65-69:</u></em><br>";
			echo $result[0];

			$stmt = $conn->prepare("SELECT COUNT('grade') FROM `grades` WHERE `grade` < 65");
			$stmt->execute();
			$result = $stmt->fetch();
			echo "<br><em><u>< 65:</u></em> <br>";
			echo $result[0];
		}
	}
catch(PDOException $e)
    {
    echo "<br>" . $e->getMessage();
    }

$conn = null;

?>