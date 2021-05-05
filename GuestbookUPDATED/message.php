<?php include_once 'header.php'; ?>
<?php date_default_timezone_set('Europe/Amsterdam'); ?>

<section class="message-form">
    <h2>Leave a message</h2>
    <div class="messageform">
    <?php
    echo    "<form action='includes/message.inc.php' method='post'>
            <input type='hidden' name='uid' value='Anonymous'>
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
    // Message form met foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
?>

<?php include_once 'footer.php'; ?>