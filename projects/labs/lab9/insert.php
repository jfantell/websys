<?php 

$config = array(
   'DB_HOST'     => 'localhost',
   'DB_USERNAME' => 'root',
   'DB_PASSWORD' => '',
);

//Insert courses into courses table
//Ignore duplicates
try {
    $conn = new PDO("mysql:host=localhost;dbname=fantej_websyslab9", $config['DB_USERNAME'], $config['DB_PASSWORD']);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "INSERT IGNORE INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
		(35091, 'ECON', 4130, 'Money and Banking', 1, 2017),
		(35303, 'ECON', 1200, 'Introductory Economics', 2, 2017),
		(35361, 'CSCI', 2300, 'Introduction to Algorithms', 6, 2017),
		(37316, 'ITWS', 4300, 'Business Issues for Engineers and Scientists', 1, 2017),
		(37350, 'ITWS', 1220, 'IT & Society', 1, 2016),
		(37551, 'ITWS', 4100, 'IT Web Science Capstone', 1, 2016),
		(37556, 'ITWS', 4370, 'Information System Security', 1, 2016),
		(37866, 'ITWS', 4400, 'X-Informatics', 1, 2016),
		(38132, 'ITWS', 4500, 'Web Science Systems Development', 1, 2016),
		(38740, 'ITWS', 4600, 'Data Analytics', 1, 2016)";

	$conn->exec($sql);

	echo "<br> <strong>New course records created successfully (10)</strong>";


	$results = $conn->query('SELECT * FROM courses');

	echo "<br>";
	foreach ($results as $r) {
		echo "<br>";
		echo "Title: " . $r['title'];
		}
	echo "<br>";
	}
catch(PDOException $e)
    {
	     echo "Exception caught: $e <br>";
    }

//Insert students into students table
//Ignore duplicates
try {

	$sql = "INSERT IGNORE INTO `students` (`rin`, `rcsID`, `first name`, `last name`, `alias`, `phone`, `street`, `city`, `st`, `zip`) VALUES
		(661545053, 'thomad', 'Thomas', 'Dulles', 'dullesthomas', 2143091111, '10 Congress St', 'Troy', 'New York', 12180),
		(661545057, 'ashleyo', 'Sam', 'Iam', 'IamSam', 2018998762, '209 Colony Drive', 'Troy', 'New York', 12180),
		(661545058, 'asiatay', 'Asia', 'Tailor', 'atay2', 2019091117, '10 Polytech St', 'Troy', 'New York', 12180),
		(661545059, 'alexo', 'Alex', 'Omady', 'AO', 2082021111, '209 Colony Ave', 'Troy', 'New York', 12180),
		(661545061, 'hnewm', 'Heather', 'Newmz', 'newmz', 2048092222, '209 Colony Ave', 'Troy', 'New York', 12180),
		(661545062, 'nickb', 'Nick', 'Bgai', 'nickb', 2018920091, '1999 Burdett Ave', 'Troy', 'New York', 12180),
		(661545063, 'armnd', 'Armand', 'Dotreal', 'armnd', 2019178981, '1999 Burdett Ave', 'Troy', 'New York', 12180),
		(661545064, 'hailey', 'Hailey', 'Gile', 'hails', 1244890900, '1999 Burdett Ave', 'Troy', 'New York', 12180),
		(661545065, 'adeel', 'Adeel', 'Minhas', 'Adele', 2017709489, '1999 Burdett Ave', 'Troy', 'New York', 12180),
		(661545066, 'atay', 'Aron', 'Tailor', 'atay', 2016540909, '1999 Burdett Ave', 'Troy', 'New York', 12180)";

	$conn->exec($sql);

	echo "<br> <strong>New student records created successfully (10)</strong>";


	$results = $conn->query('SELECT * FROM students');

	echo "<br>";
	foreach ($results as $r) {
		echo "<br>";
		echo "Student: " . $r['first name'] . " " . $r['last name'];
		}
	echo "<br>";
	}

catch(PDOException $e)
    {
	    echo "Exception caught: $e <br>";
    }

//Insert students into students table
//Ignore duplicates
try {

	$sql = "INSERT IGNORE INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
		(1, 35303, 661545066, 94),
		(2, 35091, 661545066, 89),
		(3, 37551, 661545065, 89),
		(4, 35303, 661545065, 100),
		(5, 38740, 661545064, 40),
		(6, 37350, 661545064, 67),
		(7, 37866, 661545063, 78),
		(8, 35303, 661545064, 95),
		(9, 37316, 661545063, 100),
		(10, 37866, 661545063, 82),
		(11, 35303, 661545061, 67),
		(12, 37866, 661545061, 91),
		(13, 35361, 661545059, 89),
		(14, 37551, 661545059, 57),
		(15, 35303, 661545058, 25),
		(16, 37316, 661545058, 90),
		(17, 35303, 661545057, 95),
		(18, 37866, 661545057, 48),
		(19, 37316, 661545053, 53),
		(20, 38740, 661545058, 55),
		(21, 37866, 661545058, 90),
		(22, 37316, 661545057, 100),
		(23, 37551, 661545057, 48),
		(24, 37350, 661545053, 95),
		(25, 37866, 661545053, 94)";

	$conn->exec($sql);

	echo "<br> <strong>New grade records created successfully (25)</strong><br>";


	$results = $conn->query('SELECT * FROM grades');

	foreach ($results as $r) {
		echo "<br>";
		echo "Rin: " . $r['rin'] . "&emsp;&emsp;Grade " . $r['grade'];
		}
	}

catch(PDOException $e)
    {
	     echo "Exception caught: $e <br>";
    }

$conn = null;
?>