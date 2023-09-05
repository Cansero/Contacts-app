<?php
require "database.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($user) || empty($email) || empty($password)) {
        $error = "Please fill all the fields";
    } else if (!str_contains($email, "@")) {
        $error = "Email not valid";
    } else {
        $statament = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statament->execute([":email" => $email]);

        if ($statament->rowCount() > 0) {
            $error = "Email already taken";
        } else {
            $statament = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $statament->execute([
                ":name" => $name,
                ":email" => $email,
                ":password" => password_hash($password, PASSWORD_BCRYPT)
            ]);

            header("Location: index.php");
        }
    }
}

?>

<?php require "./partials/head.php" ?>
<header>
    <nav>
        <a href="#"><img id="logo" src="./static/img/v7_logo.png" alt="v7_logo"></a>
        <ul>
            <li><a href="login.php">Log in</a></li>
            <li><a href="signup.php">Sign up</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="add-contact">
        <div class="txt">Log in</div>
        <form action="signup.php" method="post">
            <?php if ($error):?>
                <p><?= $error ?></p>
            <?php endif ?>
            <div class="formitem">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="formitem">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="formitem">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" value="Submit" id="add-btn">
        </form>
    </div>
</main>
<?php require "./partials/footer.php" ?>