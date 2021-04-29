<?php
function session(){
    session_start();
    if (isset($_POST["reset"])){
        unset($_SESSION["username"]);
        session_destroy();
    }
}
// Starts the session and destroys it when logout button is clicked

function loggedIn(){
    if (isset($_POST["username"]))
        $_SESSION["username"] = $_POST["username"];
}
// Ties username POST to SESSION
function getHeighestID(){
    $textFile = fopen("guests.txt", "r");
    $id = 0;
    while(! feof($textFile))
        if (preg_match('/\d+/', fgets($textFile), $idFound))
            if ($idFound[0] > $id)
                $id = $idFound[0];
    fclose($textFile);

    $id++;
    return $id;
}
// Tracks id number for the messages

function gastenboek() {
    if (isset($_POST["message"])) {
        $message = $_POST["message"];
        $post = '<div id="' . getHeighestID() . '">' . "<h2>" . $_SESSION["username"] . "</h2>" . ' * ' .  "<p>" . $message . "</p>" . ' * <form action="index.php" method="post"><button name="delete" value="' . getHeighestID() . '">delete</button></form></div>' . "\r\n";
        $messageFile = fopen("guests.txt", "r");

        $content = "";
        while(! feof($messageFile))
            $content .= fgets($messageFile);
        fclose($messageFile);

        $archive = fopen("guests.txt", "w");
        fwrite($archive, $content . $post);
        fclose($archive);
        header("Location:index.php");
    }
}
// Stores everything from the form into a text file

function deleteAll(){
    $a = 'guests.txt';
    $b = file_get_contents('guests.txt');
    $c = preg_replace($a, '', $b);
    file_put_contents($a, $c);
}
// Delete everything inside a file

function showPosts(){
    $messages = file_get_contents('guests.txt');
    echo $messages;
}
// Show text file

function deleteSingle(){
    $a = 'guests.txt';
    $b = file_get_contents('guests.txt');
}
// W.I.P
?>