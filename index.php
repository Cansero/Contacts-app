<?php

require "database.php";

$contacts = $conn->query("SELECT * FROM contacts");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/reset.css">
    <link rel="stylesheet" href="./static/css/style.css">
    <title>Contacts App</title>
</head>
<body>
    <header>
        <nav>
            <a href="#"><img id="logo" src="./static/img/v7_logo.png" alt="v7_logo"></a>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="add.php">Add contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php foreach ($contacts as $contact): ?>
        <div class="card">
            <h3><?= $contact["name"] ?></h3>
            <p><?= $contact["number"] ?></p>
            <div class="buttons">
                <a class="btn" href="#">Edit contact</a>
                <a class="btn danger" href="#">Delete contact</a>
            </div>
        </div>
        <?php endforeach ?>
    </main>
</body>
</html>
