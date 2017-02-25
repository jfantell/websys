<?php

//Connect to Postgres Database
$port = "port=5432";
$host = 'host=localhost'; 
$dbname = 'dbname=fantej-websyslab10';
$credentials = "user=root password=root";



$db = pg_pconnect( "$host $port $dbname $credentials"  );
 if(!$db){
    echo "Error : Unable to open database \n";
 } else {
    echo "Opened database successfully \n";

    //Query: Get all students with grades higher than 90 (first and last name)
	$sql = "SELECT students.firstname, students.lastname, grades.grade, grades.rin, courses.title FROM grades, students, courses WHERE grades.grade >= 90 AND grades.rin=students.rin AND grades.crn=courses.crn";
	$results = pg_query($db, $sql);
    if(!$results){
       echo pg_last_error($conn);
    }
    $courses = array();

	echo "<table>";  
	while($row=pg_fetch_row($results)){
        $coursetitle = $row[3];
         if (array_key_exists($coursetitle, $courses))
        {
            $courses[$coursetitle]+=1;
        }
        else {
            $courses[$coursetitle] = 1;
        }
        echo "<tr>";  
        echo "<td align='center' width='200'>" . $row[0] . "</td>";  
        echo "<td align='center' width='200'>" . $row[1] . "</td>";  
        echo "</tr>"; }
      	echo "</table>"; 
        $max = 0;

        foreach($courses as $count)
    {
        if ($count > $max)
        {
            $max = $count;
        }
    }

    $course = array_search($coursetitle, $courses);

    echo "The max count: " . $count;
    echo "<br>";
    echo "Course with max count: (it just outputted the last course with a 90+ grade): " . $coursetitle;
}

?>