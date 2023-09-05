<?php
require "database.php";
$error = null

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
        <form action="login.php" method="post">
            <?php if ($error):?>
                <p><?= $error ?></p>
            <?php endif ?>
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