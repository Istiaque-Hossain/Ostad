<?php
// Task 2: Basic OOP in PHP

// Create a PHP class called "Person" with the following properties and methods:

// Properties:

// Name
// Email


// Methods:

// setName($name): sets the name property
// setEmail($email): sets the email property
// getName(): returns the name property
// getEmail(): returns the email property


// Create an instance of the Person class and set the name and email properties. Use the getName() and getEmail() methods to display the properties on the webpage.


class Person
{
    private $name, $email;

    // function __construct($name, $email)
    // {
    //     $this->name=$name;
    //     $this->email=$email;
    // }

    public function setName($name)
    {
        return $this->name = $name;
    }
    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
}

$personObject = new Person;

$personObject->setName('istiaque');
$personObject->setEmail('istiaque@gmail.com');

echo $personObject->getName() . PHP_EOL . $personObject->getEmail() . PHP_EOL . '<br>';