<?php
// Task 1: HTML Basics
// Create an HTML form that allows users to input their name and email address. The form should have two fields: one for name and one for email. Use appropriate HTML tags to structure the form.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="task-3.php" method="post">
        <label for="name">Name:</label><br />
        <input type="text" id="name" name="name" /><br />
        <label for="email">Email</label><br />
        <input type="email" id="email" name="email" /><br /><br />
        <input type="submit" value="Submit" />
    </form>

</body>

</html>