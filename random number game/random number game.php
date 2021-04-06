<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="random number style.css">
        <title>number guessing game</title>
    </head>
  <body>
      <h1>guess the number</h1>
      <form action="random number guess.php" method="post">
      <input type="text" name="number">
      <button type="submit" name="submit">Guess</button>
      <?php
      $random_number = rand(1,10);
      $guess = $_POST["number"];
      ?>
      </form>
  </body>
</html>