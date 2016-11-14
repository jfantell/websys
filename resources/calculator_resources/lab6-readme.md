1. Explain what each of your classes and methods does, the order in which methods are invoked, and the flow of execution after one of the operation buttons has been clicked.

Classes

Operation class: This is the parent class for the Addition, Subtraction, Multiplication, and Division classes. It is an abstract class which means all abstract methods declared in the 'Operation' class must be defined by the child classes. There are two abstract methods in the "Operation" class. These methods are: operate() and getEquation(). Both methods will be defined in every child class, but they will be define differently. For instance in the "Addition" class the operate() method will add the two operands inputted by the user, whereas in the "Division" class the operate() method will divide the first operand by the second operand. The getEquation() will serve as a means of printing the output. In the "Operation" class constructor the two operands are checked to see if they are valid numbers.

OperationCubeFact: This is the parent class for the Cube, Factorial, and Fibonacci functions. It is an abtract class just like "Operation" class, however it only checks whether the first operand is a valid number. This is because the Cube, Factorial, and Fibonacci functions rely on only one input, not two. It simply ignores the second user input (if the user decides to put one in).

Addition: A child class of the "Operation" class. Adds the two operands inputted by the user together.

Subtraction: A child class of the "Operation" class. Subtracts the second operand from the first operand.

Multiplication: A child class of the "Operation" class. Multiplies the two operands.

Division: A child class of the "Operation" class. Divides first operand by second operand.

Cube: A child class of the "OperationCubeFact" class. Cubes the first operand.

Factorial: A child class of the "OperationCubeFact" class. Factorial of the first operand.

Fibonacci: A child class of the "OperationCubeFact" class. Factorial of the first operand.

(Source: http://phpenthusiast.com/object-oriented-php-tutorials/polymorphism-in-php)

Flow

Once the user clicks one of the submit buttons, the code checks to make sure the $_POST was recieved. If it was recieved without errors, the name and value that correspond with the button that was clicked is checked against a serious of "if statements" to determine which class object should be created to compute the operation.


Order in which methods are invoked

When the appropriate class object needed for an operation has been determined, the object's parent class (or parent classes if there are multiple) constructor and abstract methods are initizlized, before the methods in the object itself.

(Source: http://php.net/manual/en/keyword.extends.php)

===================================================================================================================================
2. Also explain how the application would differ if you were to use $_GET, and why this may or may not be preferable.

If $_GET was used instead, the results to each operation would be cached and stored in browser history (W3Schools). For that reason, GET is also less secure. Since this is just a basic calculator (does not involve any username/passwords) it probably would not make a difference if either $_POST or $_GET are used.

3. Finally, please explain whether or not there might be another (better +/-) way to determine which button has been pressed and take the appropriate action

A "better" way to determine which button is pressed would be to use switch statements. According to various sources/online discussions, switch statements are not neccessiarly faster than if/else statements. However, there is consensus that they make code more readable and maintainable when you there are more than two choices (http://stackoverflow.com/questions/4241768/switch-vs-if-statements; http://softwareengineering.stackexchange.com/questions/178102/why-is-there-never-any-controversy-regarding-the-switch-statement)

Fun lab. I want to make the buttons align vertically so that the calculator can run on mobile devices. Do you have any suggestions for how I would go about doing that?

-John