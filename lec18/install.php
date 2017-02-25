<?php

try {
   $conn = new PDO("mysql:host=localhost;dbname=", "root", "");
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "CREATE DATABASE IF NOT EXISTS lecture18";
   $conn->exec($sql);
} catch(PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}
try {
  $conn->query("use lecture18");
  $sql = "CREATE TABLE IF NOT EXISTS users_secure (
      uid int(11) PRIMARY KEY NOT NULL,
      username varchar(255) CHARACTER SET utf8 NOT NULL,
      pass varchar(255) CHARACTER SET utf8 NOT NULL,
      salt varchar(255) CHARACTER SET utf8 NOT NULL
  )";
  $conn->exec($sql);
  echo "Table created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}