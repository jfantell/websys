<?php
if (isset($_POST['delete']) && $_POST['delete'] == 'Delete') {
  	if(file_exists('log.txt')) {
  		unlink('log.txt');
  	}

}
else if (isset($_POST['append']) && $_POST['append'] == 'Append') {
  $fp_res = fopen('log.txt', 'a') or die("Unable to open file!");
  $txt = $_POST['txt'];
  fwrite($fp_res, "\n". $txt);
  fclose($fp_res);
}

?>
<!doctype html>
<html>
<head>
  <title>Lecture #19 Example - Files</title>
</head>
<body>
<form action="files.php" method="post">
<input name="txt" type="text"/>
<input name="append" type="submit" value="Append"/>
<input name="delete" type="submit" value="Delete"/>
</form>
<?php 
if (file_exists('log.txt')) {
  // Escape HTML entities, then convert newlines to <br> tags
  echo nl2br(htmlentities(file_get_contents('log.txt')));
}
?>
</body>
</html>
