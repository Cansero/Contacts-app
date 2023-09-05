<?php
require "database.php";

$error =null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["number"])) {
        $error = "Please fill all the fields";
    } else if (strlen($_POST["number"]) < 9) {
        $error = "Phone number must be at least 9 characters";
    } else {
        $name = $_POST["name"];
    $number = $_POST["number"];

    $statament = $conn->prepare("INSERT INTO contacts (name, number) VALUES (:name, :number)");
    $statament->bindParam(":name", $_POST["name"]);
    $statament->bindParam(":number", $_POST["number"]);
    $statament->execute();

    header("Location: index.php");
    }
}
?>

<?php require "./partials/head.php" ?>
<?php require "./partials/header.php" ?>
<main>
    <div class="add-contact">
        <div class="txt">Add new contact</div>
        <form action="add.php" method="post">
            <?php if ($error):?>
                <p><?= $error ?></p>
            <?php endif ?>
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
<?php require "./partials/footer.php" ?>