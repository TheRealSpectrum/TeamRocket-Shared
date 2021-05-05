<?php include_once 'header.php'; ?>

<link rel="icon" href=../img/spacebook-website-icons.png>
<section class="signup-form">
    <h2>Sign up</h2>
    <div class="signup">
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emtpyinput") {
            echo "<p>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
        }
        else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        }
        else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords don't match!</p>";
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again!</p>";
        }
    }
    // Error handling

    ?>
</section>

<?php include_once 'footer.php'; ?>