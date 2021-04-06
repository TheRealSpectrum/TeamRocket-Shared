<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="random number style.css">
        <title>number guessing game</title>
    </head>
  <body>
      <h1>your guess is...</h1>
      <?php
        $guess = $_POST["number"];
        
        if($guess == $random_number){
            echo "<p>your guess is correct</p>";
        } elseif($guess > $random_number){
            echo "<p>your guess is to high</p>";
        } elseif($guess < $random_number){
            echo "<p>your guess is to low</p>";
        } if($guess == " "){
            echo "<p>make a guess</p>";
        }
      ?>
  </body>
</html>