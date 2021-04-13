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

$guess = isset($_POST['guess']) ? (int) $_POST['guess'] : false;

// Elke keer als je op de submit button drukt (regel 104), wordt het bestand raadgame.php opnieuw getriggered.
// Dit will zeggen dat $guesses = []; elke keer opnieuw wordt defined. En dus elke keer opnieuw leeg wordt aangemaakt.
// De array zal ook een $_SESSION moeten worden. 
//$guesses  = array();


//if(isset($_SESSION['guess']))
//{
//    $_SESSION["guess"] = $guess;
//    // Push guess in array guesses
//    array_push($guesses, $_SESSION["guess"]);
//}

$rand = $_SESSION['the_number'];
$counter = $_SESSION['counter'];


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
//    print "<p>The numbers you have guessed so far: ";
 //   print_r($guesses);
 //   print "</p><br>";

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
</body>
</html>