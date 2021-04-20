<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="styles.css">
<title>SpaceBook</title>
</head>
<body>
    <button>
        <a href="index.php" class="gb-link">View Guestbook</a>
    </button>
    <button>
        <a href="form.php" class="msg-link">Leave a Message</a>
    </button>
    <form name="form" class="" action="form.php" method="post">
        <fieldset>
          <section class="one">
            <label>Name</label>
            <input pattern="^[A-Za-zÀ-ÿ ,.'-]+$" type="text" name="name" value="<?php echo $_POST['name']; ?>" placeholder="Name">
          </section>
          <section class="two">
            <label>Email</label>
            <input pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" type="text" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Email">
          </section>
          <section class="three">
            <label>Message</label>
            <textarea name="message" rows="8" cols="40" value="<?php echo $_POST['message']; ?>" placeholder="message"></textarea>
          </section>
            <button type="submit">Submit</button>
        </fieldset>
    </form>
</body>
</html>

<?php
// Als er iets is ingevoerd wordt het gevalideert of anders wordt er een error weergegeven.
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
// Als er geen errors zijn, post hij de informatie naar guests file. Anders laat hij errors zien.
  if (!$errors) {
    $guests = fopen('guests.txt', 'a+')
    OR die ("Can't open file\n");
    fwrite ($guests, "<h2>User: " . $_POST["name"] . "</h2>" . "\n");
    fwrite ($guests, "<p>E-mail: " . $_POST["email"] . "</p>" . "\n");
    fwrite ($guests, "<p>" . $_POST["message"] . "</p>" . "\n");
    fclose($guests);
    header('Location: index.php');
    exit;
}
else {
    echo '<div style="color: red">' . $errors . '<br/></div>';
}
?>