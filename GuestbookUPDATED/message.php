<?php include_once 'header.php'; ?>
<?php date_default_timezone_set('Europe/Amsterdam'); ?>

<?php
    if (isset($_SESSION["useruid"])) {
        echo "<div class='usergreet'><p>Your are logged in as: " . $_SESSION["useruid"] . "<br>Welcome!</p></div>";
    }
    // Welkomst tekst voor de ingelogde user.
?>
<section class="message-form">
    <h2>Leave a message</h2>
    <div class="messageform">
    <?php
    echo    "<form action='includes/message.inc.php' method='post'>
            <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <textarea name='message'></textarea>
            <button type='submit' name='submit'>Post</button>
            </form>";
    ?>
    </div>
</section>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
    }
    // Message form met datum en foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
?>

<?php include_once 'footer.php'; ?>