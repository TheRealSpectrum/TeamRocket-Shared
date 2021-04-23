<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="styles.css">
<title>SpaceBook</title>
<?php include "functies.php" ?>
</head>
<body>

    <?php session_start(); ?>
    <?php loggedIn(); ?>

    <button>
        <a href="index.php" class="gb-link">View Guestbook</a>
    </button>
    <form name="form" class="" action="form.php" method="post">
        <fieldset>
            <label>Message</label>
            <textarea name="message" rows="8" cols="40" value="<?php echo $_POST['message']; ?>" placeholder="message"></textarea>
            <button type="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>

<?php gastenboek(); ?>