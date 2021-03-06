<?php include_once 'header.php'; ?>

    <section class="signup-form">
        <form action="includes/signup.inc.php" method="post">
            <h2>Sign up</h2>
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </section>

    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
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
        else if ($_GET["error"] == "none") {
            echo "<p>You have succesfully signed up!";
        }
    }
    // Signup form met foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
    ?>

<?php include_once 'footer.php'; ?>