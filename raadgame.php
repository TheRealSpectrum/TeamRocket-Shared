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
if(!isset($_SESSION['guess'])){
    $_SESSION['guess'] = array();
}

$rand = $_SESSION['the_number'];
$counter = $_SESSION['counter'];
$guess = isset($_POST['guess']) ? (int) $_POST['guess'] : false;


if($guess == $rand)
{
    unset($_SESSION['the_number']);
    unset($_SESSION['counter']);
    unset($_SESSION['guess']);
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
    print "The number you input is $guess <br />";
    print "The numbers guessed so far:" . $_SESSION['guess'] . "<br />";

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
<a href="raadgame.php">Press Here to Restart</a>
<?php endif; ?>

</body>
</html>