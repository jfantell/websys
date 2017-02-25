<?php
  
//Connect to the MySQL Databse from Lab 9
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=fantej_websyslab9", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL DB successfully <br>";
    }
catch(PDOException $e)
    {
    echo "MySQL DB Connection failed: " . $e->getMessage() . "<br>";
    }


// Grab all of the data in the MySQL database table "courses"
try {
	$courses = $conn->query('SELECT * FROM courses');
	}

catch(PDOException $e)
	{
	echo "Query failed: " . $e->getMessage();
	}
// Grab all of the data in the MySQL database table "students"
try {
  $students = $conn->query('SELECT * FROM students');
  }

catch(PDOException $e)
  {
  echo "Query failed: " . $e->getMessage();
  }
// Grab all of the data in the MySQL database table "grades"
try {
  $grades = $conn->query('SELECT * FROM grades');
  }

catch(PDOException $e)
  {
  echo "Query failed: " . $e->getMessage();
  }

//Kill MySQL database
$conn = null;

/////////////////////////////////////////////////////////////////////////////////////////////////

//Connect to Postgres Database
$port = "port=5432";
$host = 'host=localhost'; 
$dbname = 'dbname=fantej-websyslab10';
$credentials = "user=root password=root";



$db = pg_pconnect( "$host $port $dbname $credentials"  );
 if(!$db){
    echo "Error : Unable to open Postgres database <br>";
 } else {
    echo "Opened Postgres database successfully <br>";
  //If connection successful

  //Migrate: MySQL databse tables to Postgres database tables
  //Insert the "couses" table from MySQL database to "courses" table in the Postgres database
  foreach ($courses as $r) {
    $sql = "INSERT INTO courses VALUES ('$r[crn]', '$r[prefix]', '$r[number]', '$r[title]', '$r[section]', '$r[year]') ON CONFLICT (crn) DO NOTHING;";
    pg_query($db, $sql);
  }

  //Insert the "students" table from MySQL database to "students" table in the Postgres database
  foreach ($students as $r) {
    $sql = "INSERT INTO students VALUES ('$r[rin]', '$r[rcsID]', '$r[first_name]', '$r[last_name]', '$r[alias]', '$r[phone]', '$r[street]', '$r[city]', '$r[st]', '$r[zip]') ON CONFLICT (rin) DO NOTHING;";
    pg_query($db, $sql);
  }

  //Insert the "grades" table from MySQL database to "grades" table in the Postgres database
  foreach ($grades as $r) {
    $sql = "INSERT INTO grades VALUES ('$r[id]', '$r[crn]', '$r[rin]', '$r[grade]') ON CONFLICT (id) DO NOTHING;";
    pg_query($db, $sql);
  }

  //Query the postgres table courses
  $sql = "SELECT * FROM courses";
  $results = pg_query($db, $sql);

  //Echo the output of courses
  echo "<br><b>Courses Table</b><br><table>";  
  while($row=pg_fetch_assoc($results)){echo "<tr>";  
    echo "<td align='center' width='200'>" . $row['crn'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['prefix'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['number'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['title'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['section'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['year'] . "</td>";  
    echo "</tr>"; }
  echo "</table>"; 

  //Query the postgres table students
  $sql = "SELECT * FROM students";
  $results = pg_query($db, $sql);

  //Echo the output of students
  echo "<br><b>Students</b><table>";  
  while($row=pg_fetch_assoc($results)){echo "<tr>";  
    echo "<td align='center' width='200'>" . $row['rin'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['rcsid'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['firstname'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['lastname'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['alias'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['phone'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['street'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['city'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['st'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['zip'] . "</td>";  
    echo "</tr>"; }
  echo "</table>"; 

  //Query the postgres table grades
  $sql = "SELECT * FROM grades";
  $results = pg_query($db, $sql);

  //Echo the output of grades
  echo "<br><b>Grades</b><table>";  
  while($row=pg_fetch_assoc($results)){echo "<tr>";  
    echo "<td align='center' width='200'>" . $row['id'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['crn'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['rin'] . "</td>";  
    echo "<td align='center' width='200'>" . $row['grade'] . "</td>";  
    echo "</tr>"; }
  echo "</table>"; 

}

pg_close($db);

?>