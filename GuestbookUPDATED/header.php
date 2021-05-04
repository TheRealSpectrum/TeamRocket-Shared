<?php session_start() ?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SpaceBook</title>
  <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav>
        <div class="navcontainer">
            <a href="index.php"><img src="assets/img/logo.jpg" alt="SpaceBook logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<li><a href='message.php'>Leave a message</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                }
                else {
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Log in</a></li>";
                }

                // Veranderd de navigatie als je ingelogd bent.
                ?>
            </ul>
        </div>
    </nav>

    <div class="maincontainer">