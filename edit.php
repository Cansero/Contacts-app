<?php
require "database.php";

$id = $_GET["id"];

$statament = $conn->prepare("SELECT * FROM contacts WHERE id = :id LIMIT 1");
$statament->execute([":id" => $id]);

if ($statament->rowCount() == 0) {
    http_response_code(404);
    echo("HTTP 404: NOT FOUND");
    return;
}

$contact = $statament->fetch(PDO::FETCH_ASSOC);

$error =null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["number"])) {
        $error = "Please fill all the fields";
    } else if (strlen($_POST["number"]) < 9) {
        $error = "Phone number must be at least 9 characters";
    } else {
        $name = $_POST["name"];
    $number = $_POST["number"];

    $statament = $conn->prepare("UPDATE contacts SET name = :name, number = :number WHERE id = :id");
    $statament->execute([
        ":id" => $id,
        ":name" => $_POST["name"],
        ":number" => $_POST["number"]
    ]);

    header("Location: index.php");
    }
}
?>

<?php require "./partials/head.php" ?>
<?php require "./partials/header.php" ?>
<main>
    <div class="add-contact">
        <div class="txt">Add new contact</div>
        <form action="edit.php?id=<?= $contact["id"] ?>" method="post">
            <?php if ($error):?>
                <p><?= $error ?></p>
            <?php endif ?>
            <div class="formitem">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $contact["name"] ?>">
            </div>
            <div class="formitem">
                <label for="number">Phone number:</label>
                <input type="text" id="number" name="number" value="<?= $contact["number"] ?>">
            </div>
            <input type="submit" value="Submit" id="add-btn">
        </form>
    </div>
</main>
<?php require "./partials/footer.php" ?>