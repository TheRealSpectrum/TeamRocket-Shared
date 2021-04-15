<h1>My Guestbook</h1>
<a href="index.php" class="gb-link"><p>View Guestbook</p></a>
<p class="divider">|</p>
<a href="form.php" class="msg-link"><p>Leave a Message</p></a>
<form name="form" class="" action="form.php" method="post">
  <label for="">
    <h5>Name</h5>
    <input type="text" name="name" value="<?php echo $_POST['name']; ?>" placeholder="Name">
    <br>
  </label>
  <label for="">
    <h5>Email</h5>
    <input type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Email">
    <br>
  </label>
  <label for="">
    <h5>Message</h5>
    <textarea name="message" rows="8" cols="40" value="<?php echo $_POST['message']; ?>" placeholder="message"></textarea>
    <br>
  </label>
  <br>
  <input class="submit" type="submit" name="submit" value="Submit">
</form>
<p>
<?php
  if ($_POST['name'] != "") {
    $_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    if ($_POST['name'] == "") {
         $errors .= 'Please enter a valid name.<br/>';
     }
    }
  else {
      $errors .= 'Please enter your name.<br/>';
  }

  if ($_POST['message'] != "") {
      $_POST['message'] = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
      if ($_POST['message'] == "") {
          $errors .= 'Please enter your message.<br/>';
      }
  }
  else {
      $errors .= 'Please enter your message.<br/>';
  }
  if ($_POST['email'] != "") {
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors .= "$email is <strong>NOT</strong> a valid email address.<br/><br/>";
      }
  }
  else {
      $errors .= 'Please enter your email address.<br/>';
  }

  if (!$errors) {
      $mail_to = 'me@somewhere.com';
      $subject = 'Email from Form';
      $message  = 'From: ' . $_POST['name'] . "\n";
      $message .= 'Email: ' . $_POST['email'] . "\n";
      $message .= "message:\n" . $_POST['message'] . "\n\n";
      mail($to, $subject, $message);
      $guests = fopen('guests.txt', 'a+')
        OR die ("Can't open file\n");
      fwrite ($guests, $_POST["name"] . "\n");
      fwrite ($guests, $_POST["email"] . "\n");
      fwrite ($guests, $_POST["message"] . "\n");
      fclose($guests);

      header('Location: thank-you.php');
      exit;
  }
  else {
      echo '<div style="color: red">' . $errors . '<br/></div>';
  }
?>
</p>