<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="styles.css">
<title>Guestbook</title>
</head>
<body>
    <h1>Guestbook</h1>
    <button>
      <a href="index.php" class="gb-link">View Guestbook</a>
    </button>
    <button>
      <a href="form.php" class="msg-link">Leave a Message</a>
    </button>
    <div class=messagecontainer>
      <?php
      $guests = fopen("guests.txt", "r") or die("Unable to open file!");
      echo file_get_contents('guests.txt');
      fclose($guests);
      ?>
    </div>
</body>
</html>