<?php
require "database.php";

session_start();

$contacts = $conn->query("SELECT * FROM contacts");

?>

<?php require "./partials/head.php" ?>
<?php require "./partials/header.php" ?>
<main>
    <?php foreach ($contacts as $contact): ?>
    <div class="card">
        <h3><?= $contact["name"] ?></h3>
        <p><?= $contact["number"] ?></p>
        <div class="buttons">
            <a class="btn" href="edit.php?id=<?= $contact["id"] ?>">Edit contact</a>
            <a class="btn danger" href="delete.php?id=<?= $contact["id"] ?>">Delete contact</a>
        </div>
    </div>
    <?php endforeach ?>
</main>
<?php require "./partials/footer.php" ?>