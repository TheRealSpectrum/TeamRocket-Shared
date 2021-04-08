<?php

session_start();


if(!isset($_SESSION['the_number']))
{
    $_SESSION['the_number'] = rand(1, 100);
}

if(!isset($_SESSION['counter']))
{
    $_SESSION['counter'] = 0;
}
else
{
    $_SESSION['counter']++;
}

$rand = $_SESSION['the_number'];
$counter = $_SESSION['counter'];
$guess = isset($_POST['guess']) ? (int) $_POST['guess'] : false;


if($guess == $rand)
{
    // If the user guessed the number, unset counter & rand number
    // This way, on the next refresh, the game will restart
    unset($_SESSION['the_number']);
    unset($_SESSION['counter']);
}



?>

<!DOCTYPE html>
<html lang="EN">
<head>
<link rel="stylesheet" href="raadgame.css">
<title>Thinking of a Number</title>
</head>

<body>

<h1>I'm Thinking of a Number 1-100</h1>

<?php

if ($guess != false)
{
    
    print "<hr />";
    print "<p>The number you input is $guess </p><br />";
    print "<p>The numbers guessed so far: $number </p><br />";

    if ($guess == $rand)
    {
        print "<p>You are correct </p><br />";
        print "<p>You guessed it in ".$counter." attempt(s).</p>";
    }
    else if ($guess != $rand)
    {
        if($guess > $rand)
        {
            print "<p>You are too high. </p><br />";
            print "<p>Try again</p>";
        }
        else if ($guess < $rand)
        {
            print "<p>You are too low. </p><br />";
            print "<p>Try again</p>";
        }
    }
}

?>

<hr />

<?php if($guess != $rand): ?>
<form action = "" method = "post">
    <fieldset>
        <label>Enter a number: </label>
        <input type = "text" name = "guess" /><br />
        <button type = "submit">Submit</button>
    </fieldset>
</form>
<?php else: ?>
    <img class="you_right" src="img/you're goddamn right.jpeg">
    <section class="Restart_button">
        <a href="raadgame.php">Press Here to Restart</a>
    </section>
    
<?php endif; ?>

<!--

The Random Number: <?php echo $rand; ?>

The Counter: <?php echo $counter; ?>

The Guess: <?php echo htmlspecialchars($guess); ?>


-->
<?php echo $_SESSION["the_number"]?>
</body>
</html>