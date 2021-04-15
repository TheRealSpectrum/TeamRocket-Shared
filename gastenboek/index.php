<h1>My Guestbook</h1>
<a href="index.php" class="gb-link"><p>View Guestbook</p></a>
<p class="divider">|</p>
<a href="form.php" class="msg-link"><p>Leave a Message</p></a>
<p class="rsps">
  <?php
  $guests = fopen("guests.txt", "r") or die("Unable to open file!");
  echo fread($guests,filesize("guests.txt"));
  fclose($guests);
  ?>
</p>