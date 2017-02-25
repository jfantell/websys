<?php
	if(isset($_POST['submit'])){
		if(isset($_POST['options'])){
			$selected_val = $_POST['options'];  // Storing Selected Value In Variable
			echo "<div class='container'><div class='jumbotron'>";
			//If option 1, execute installing the database
			if($selected_val == 1){
				include 'install.php';
			}
			//If option 2, execute inserting data into the tables
			else if($selected_val == 2){
				include 'insert.php';
			}
			//If option 3, query, sort, and echo out students by last name, then first name
			else if($selected_val == 3){
				include 'output.php';
			}
			//If option 4, query and echo out the grade count distribution
			else if($selected_val == 4){
				include 'output.php';
			}
			echo "</div></div>";
		}
	}
?>

<!Doctype html>
<html>
<head>
	<!--Bootsrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
	#format {
		color: red;
	}

	#wrapper {
		width: 75%;
		margin: 0 auto;
	}

	.row {
		padding: 10px;
	}

	.jumbotron {
		margin-top: 20px;
	}

	</style>
</head>
<body>
	<div id="wrapper">
		<div class="container">
			<!--User will select an option and then click submit-->
			<!--Each value is associated with a different operation in the php script-->
			<form action="index.php" method="post" onSubmit="">
				<div class="row">
					<select id"options" name="options" class="col-sm-4 col-sm-offset-3">
						<option value="1">1: Install Database</option>
						<option value="2">2: Insert Items into Database</option>
						<option value="3">3: Query Databse (Student Names)</option>
						<option value="4">4: Query Databse (Grade Distribution)</option>
					</select>
				</div>
				<div class="row">
					<input class="btn btn-primary col-sm-4 col-sm-offset-3" name="submit" type="submit" value="Submit">
				</div>
			</form>
		</div>
	</div>
</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>