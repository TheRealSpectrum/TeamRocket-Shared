<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>
<?php date_default_timezone_set('Europe/Amsterdam'); ?>

<section class="memes-form">
    <h2>Share memes</h2>
    <div class="memeform">
    <?php
    echo    "<form action='includes/memes.inc.php' method='post'>
            <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <input type='url' name='link' placeholder='Insert url here...'>
            <button type='submit' name='submit'>Post</button>
            </form>";
    ?>
    </div>
</section>

<section class="memes-View">
    <h2>Submitted Memes</h2>
    <div class="memeview">
    <?php
    getMemes($conn);
    ?>
    </div>
</section>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
    }
    // Meme form met datum en foutmeldingen.
    // zodra er op de knop is gedrukt linked deze door naar andere code met functionaliteit.
?>

<?php include_once 'footer.php'; ?>