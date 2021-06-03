<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>
<?php date_default_timezone_set('Europe/Amsterdam'); ?>

<?php
    if (isset($_SESSION["useruid"])) {
        echo "<div class='usergreet'><p>Your are logged in as: " . $_SESSION["useruid"] . "<br>Welcome!</p></div>";
    }
    // Welkomst tekst voor de ingelogde user.
?>
<section class="memes-form">
    <?php
    echo    "<form action='includes/memes.inc.php' method='post'>
            <h2>Share memes</h2>
            <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <input type='url' name='link' placeholder='Insert url here...'>
            <button type='submit' name='submit'>Post</button>
            </form>";
    // Meme form met datum en foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
    ?>
</section>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
    }
?>

<section class="memeview">
    <?php getMemes($conn); ?>
</section>

<?php include_once 'footer.php'; ?>