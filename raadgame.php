<?php

$x   = rand(1, 100);
$num = '';

if (isset($_POST['submit'])) {


        if ($num < $x) 
        {
            echo " Your number is lower! <br />";
        } elseif ($num > $x) 
            {
            echo " Your number is higher! <br />";
        } elseif ($num == $x) 
            {
            echo " Congratulations! You guessed the hidden number. <br />";
        } else 
            {
            echo " You never set a numberrr! <br />";
        }




}
?>
<p>
<form action="" method="post">
<input type="text" name="num">
<button type="submit" name="submit">Guess</button>
<button type="reset" name="Reset">Reset</button>
</form>
</p>