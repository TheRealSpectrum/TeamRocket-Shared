<?php include_once 'header.php'; ?>

<section class="login-form">
    <h2>Log in</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username/Email...">
        <input type="password" name="password" placeholder="Password...">
        <button type="submit" name="submit">Log in</button>
    </form>
</section>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login</p>";
        }
    }
    // Login form met foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
    ?>

<?php include_once 'footer.php'; ?>