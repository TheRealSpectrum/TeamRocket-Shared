<?php session_start() ?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SpaceBook</title>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" href="../img/spacebook-website-icons.png">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <nav>
        <div class="navcontainer">
            <a href="index.php"><img src="assets/img/logo.jpg" alt="SpaceBook logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<li class='message'><a href='message.php'>Leave a message</a></li>";
                    echo "<li><a href='memes.php'>Memes</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                }
                else {
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Log in</a></li>";
                }
                // Begint de html met navigatie.
                // Verander de navigatie als je ingelogd bent.
                ?>
            </ul>
        </div>
    </nav>

    <div class="maincontainer">