<?php
// Task 3: Superglobal Variables in PHP
// Create a PHP script that retrieves the user's name and email from the HTML form in Task 1 using the $_POST superglobal variable. Create a new instance of the Person class and use the setName() and setEmail() methods to set the name and email properties based on the form data. Use the getName() and getEmail() methods to display the properties on the webpage.
// echo $_POST['name'] . $_POST['email'];
require 'task-2.php';
$personObject2 = new Person;

$personObject2->setName($_POST['name']);
$personObject2->setEmail($_POST['email']);

echo $personObject2->getName() . PHP_EOL . $personObject2->getEmail();