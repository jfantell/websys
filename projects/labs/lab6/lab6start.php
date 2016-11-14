<?php 
  //Two abstract classes are used
  //The one that was given initially, "Operation" which utilizes two operands
  //And the abstract class "OperationCubeFact" which utilizes only one operand
  //and therefore only checks that the first operand is a number
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...

      if (!is_numeric($o1) || !is_numeric($o2)) {
        throw new Exception('Non-numeric operand.');
      }
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

// Part 1 - Add subclasses for Subtraction, Multiplication and Division here
  class Subtraction extends Operation {
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }
  class Multiplication extends Operation {
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
    public function getEquation() {
      return $this->operand_1 . ' * ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }
  class Division extends Operation {
    //To avoid getting an error, if the second operand is a 0
    //the function returns undefined
    public function operate() {
      if($this->operand_2 == 0){
        return "Undefined";
      }
      else {
        return $this->operand_1 / $this->operand_2;
      }
    }
    public function getEquation() {
      return $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate();
    }
  }

  abstract class OperationCubeFact {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...

      if (!is_numeric($o1)) {
        throw new Exception('Non-numeric operand.');
      }
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }
  class Cube extends OperationCubeFact {
    public function operate() {
      return pow($this->operand_1,3);
    }
    public function getEquation() {
      return $this->operand_1 . ' ^ ' . '3' . ' = ' . $this->operate();
    }
  }
  class Factorial extends OperationCubeFact {
    public function operate() {
      function factorial($number) { 
        if ($number < 2) { 
            return 1; 
        } else { 
            return ($number * factorial($number-1)); 
        } 
      }
      return factorial($this->operand_1);
    }
    
    public function getEquation() {
      return $this->operand_1 . ' ! ' . ' = ' . $this->operate();
    }
  }
  class Fibonacci extends OperationCubeFact {
    public function operate() {
      //From wikipedia
      function Fib($n){
        return round(pow((sqrt(5)+1)/2, $n) / sqrt(5));
      }
      return Fib($this->operand_1);
    }
    public function getEquation() {
      return ' fib(' . $this->operand_1 . ') = ' . $this->operate();
    }
  }



// End Part 1

// Some debugs - un comment them to see what is happening...
// echo '$_POST print_r=>',print_r($_POST);
// echo "<br>",'$_POST vardump=>',var_dump($_POST);
// echo '<br/>$_POST is ', (isset($_POST) ? 'set' : 'NOT set'), "<br/>";
// echo "<br/>---";


// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add') {
      $op = new Addition($o1, $o2);
    }
// Put the code for Part 2 here  \/
    if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
    if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
    if (isset($_POST['div']) && $_POST['div'] == 'Divide') {
      $op = new Division($o1, $o2);
    }
    if (isset($_POST['cub']) && $_POST['cub'] == 'Cube') {
      $op = new Cube($o1, $o2);
    }
    if (isset($_POST['fac']) && $_POST['fac'] == 'Factorial') {
      $op = new Factorial($o1, $o2);
    }
    if (isset($_POST['fib']) && $_POST['fib'] == 'Fibonacci') {
      $op = new Fibonacci($o1, $o2);
    }

// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!doctype html>
<html>
<head>
<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
<!--Bootsrap CSS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--Custom CSS-->
<link rel="stylesheet" href="./resources/lab6.css">
<title>Lab 6</title>
</head>
<body>
  <pre id="result">
  <?php 
    if (isset($op)) {
      try {
        echo $op->getEquation();
      }
      catch (Exception $e) { 
        $err[] = $e->getMessage();
      }
    }
      
    foreach($err as $error) {
        echo $error . "\n";
    } 
  ?>
  </pre>
  <div class="container">
    <h1>Calculator</h1>
    <div class="jumbotron">
      <form method="post" action="lab6start.php">
          <div class="row">
            <!--data-toggle element: User can hover over the hint to get information on what they should put in the one or two fields-->
            <a href="#" data-toggle="tooltip" title="If you want divide 5 by 4 make sure to put 5 in the first field
              and 4 in the second field! As far as factorial goes, you only have to put a number in the first field (if you put
              a number in the second field it will be ignored). Same thing for the cube function!">Hint</a>
            <!--Input fields-->
            <input class="form-control" type="text" name="op1" id="name" value="Please enter a number: " onblur="onBlur(this)" onfocus="onFocus(this)" />
            <input class="form-control" type="text" name="op2" id="name" value="Please enter a number: " onblur="onBlur(this)" onfocus="onFocus(this)" />
          </div>
          <!--Buttons for each operation-->
          <div class="row">
            <!-- Only one of these will be set with their respective value at a time -->
                <div class="col-md-2"><input class="btn btn-primary btn-block" type="submit" name="add" value="Add" /></div>
                <div class="col-md-2"><input class="btn btn-success btn-block" type="submit" name="sub" value="Subtract" /></div>
                <div class="col-md-2"><input class="btn btn-primary btn-block" type="submit" name="mult" value="Multiply" /></div>
                <div class="col-md-2"><input class="btn btn-success btn-block" type="submit" name="div" value="Divide" /></div>
                <div class="col-md-2"><input class="btn btn-primary btn-block" type="submit" name="cub" value="Cube" /></div>
                <div class="col-md-2"><input class="btn btn-success btn-block" type="submit" name="fac" value="Factorial" /></div>
                <div class="col-md-2"><input class="btn btn-primary btn-block" type="submit" name="fib" value="Fibonacci" /></div>
          </div>
      </form>
    </div>
  </div>
  <!--A footer-->
  <div class="container footer">
       <h2 class="bg-success">Have a comment or suggestion? Send me an <a href="mailto:fantej@rpi.edu">E-mail</a></h2>
       <h2 class="bg-danger">Will be optimizing calculator for mobile devices soon!</h2>
  </div>
  <!--Bootstrap/Jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
   //JQUERY to add a background image and the data-toggle tool that allows users to hover over the text titled "Hint"
    function onBlur(el) {
    if (el.value == '') {
        el.value = el.defaultValue;
      }
    }
    function onFocus(el) {
      if (el.value == el.defaultValue) {
        el.value = '';
      }
    }
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $("body").css("background","url(./resources/math.jpg) no-repeat");
    });
  </script>
</body>
</html>

