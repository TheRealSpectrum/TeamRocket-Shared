<?php include_once 'header.php'; ?>

<link rel="icon" href=../img/spacebook-website-icons.png>
<section class="login-form">
    <h2>Log in</h2>
    <div class="login">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email...">
            <input type="password" name="password" placeholder="Password...">
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emtpyinput") {
            echo "<p>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login</p>";
        }
    }
    ?>
</section>

<?php include_once 'footer.php'; ?>