<?php
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];

    $statament = $conn->prepare("INSERT INTO contacts (name, number) VALUES ('$name', '$number')");
    $statament->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/style.css">
    <link rel="stylesheet" href="./static/css/style-add.css">
    <title>Contacts App</title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img id="logo" src="./static/img/v7_logo.png" alt="v7_logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Add contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="add-contact">
            <div class="txt">Add new contact</div>
            <form action="add.php" method="post">
                <div class="formitem">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="formitem">
                    <label for="number">Phone number:</label>
                    <input type="text" id="number" name="number">
                </div>
                <input type="submit" value="Submit" id="add-btn">
            </form>
        </div>
    </main>
</body>
</html>