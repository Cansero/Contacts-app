<header>
    <nav>
        <a href="#"><img id="logo" src="./static/img/v7_logo.png" alt="v7_logo"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add.php">Add contact</a></li>
            <?php if (isset($_SESSION["user"])): ?>
                <li><?= $_SESSION["user"]["email"] ?></li>
            <?php endif ?>
        </ul>
    </nav>
</header>