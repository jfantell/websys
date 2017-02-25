<?php 

   require '../config.php';

   try {

   	$dbconn = new PDO('mysql:host=localhost;dbname=websys_shop', $config['DB_USERNAME'], $config['DB_PASSWORD']);
   	$dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//open connection here
   } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
   }

   if ($dbconn) {
      echo "Connected!";
   }
 ?>