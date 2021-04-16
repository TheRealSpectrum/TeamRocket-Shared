<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="styles.css">
<title>Guestbook</title>
</head>
<body>
</body>
</html>

    <h1>Guestbook</h1>
    <button>
      <a href="index.php" class="gb-link">View Guestbook</a>
    </button>
    <button>
      <a href="form.php" class="msg-link">Leave a Message</a>
    </button>
    <div class=messagecontainer>
    </div>

    <?php
    
    $guests = fopen("guests.txt", "r") or die("Unable to open file!");
    echo file_get_contents('guests.txt');
    fclose($guests);

    function button1() {
    // Delete all comments          WORK IN PROGRESS
    $a = 'guests.txt';
    $b = file_get_contents('guests.txt');
    $c = preg_replace('guests.txt', '', $b);
    file_put_contents($a, $c);
    }

    if(array_key_exists('delete', $_POST)) {
      button1();
    }
    
    ?>
    
    <form method="post">
      <input type="submit" name="delete" class="button" value="delete all" />
    </form>

</body>
</html>