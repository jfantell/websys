<?php

$port = "port=5432";
$host = 'host=localhost'; 
$dbname = 'dbname=fantej-websyslab10';
$credentials = "user=root password=root";

try {

  $db = pg_pconnect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database \n";
   } else {
      echo "Opened database successfully <br>";
   }

  //Create courses table in Postgres database
  $sql ="CREATE TABLE IF NOT EXISTS courses(
      crn int NOT NULL PRIMARY KEY,
      prefix varchar(4) NOT NULL,
      number smallint NOT NULL,
      title varchar(255) NOT NULL,
      section int NOT NULL,
      year int NOT NULL)";

  $success = pg_query($db, $sql);
  if($success){
    echo "Postgres Database Table 'courses' was created <br>";
  }

  //Create students table in Postgres database
  $sql ="CREATE TABLE IF NOT EXISTS students (
    rin int NOT NULL PRIMARY KEY,
    rcsid varchar(7) NOT NULL,
    firstname varchar(100) NOT NULL,
    lastname varchar(100)  NOT NULL,
    alias varchar(100) NOT NULL,
    phone int DEFAULT NULL,
    street varchar(100) NOT NULL,
    city varchar(100) NOT NULL,
    st varchar(50) NOT NULL,
    zip int NOT NULL)";

  $success = pg_query($db, $sql);
  if($success){
    echo "Postgres Database Table 'students' was created <br>";
  }

  //Create grades table in Postgres database
  $sql ="CREATE TABLE IF NOT EXISTS grades (
    id SERIAL PRIMARY KEY,
    crn int NOT NULL,
    rin int NOT NULL,
    grade int NOT NULL,
    FOREIGN KEY (crn) REFERENCES courses (crn),
    FOREIGN KEY (rin) REFERENCES students (rin))";

  $success = pg_query($db, $sql);
  if($success){
    echo "Postgres Database Table 'grades' was created <br>";
  }
  
}
catch (PDOException $e) { 
  echo "Error : " . $e->getMessage() . "<br/>"; 
}

pg_close($db);

?>

