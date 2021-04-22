<?php
function session(){
    session_start();
    if (isset($_POST["reset"])){
        unset($_SESSION["username"]);
        session_destroy();
    }
}

function loggedIn(){
    if (isset($_POST["username"]))
        $_SESSION["username"] = $_POST["username"];
}

function delete($id){
    $regex = '/<div id="' . $id . '".*?<\/div>/';
    $content = "";
    $file = file("guests.txt");

    for ($i = 0; $i < count($file); $i++)
        if (!preg_match($regex, $file[$i]))
            $content = $content . $file[$i];
    
    
    $messagesFile = fopen("guests.txt", "w");
    fwrite($messagesFile, $content);
    fclose($messagesFile);
}

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

function messageBoard() {
    if (isset($_POST["message"])) {
        $message = $_POST["message"];
        $user = $_POST["name"];
        $email = $_POST["email"];
        $post = '<div id="' . getHeighestID() . '">' . $_SESSION["username"] . ' * ' .  $message . ' * <form action="index.php" method="post"><button name="delete" value="' . getHeighestID() . '">delete</button></form></div>' . "\r\n";
        $messageFile = fopen("guests.txt", "r");

        // Leest bericht
        $content = "";
        while(! feof($messageFile))
            $content .= fgets($messageFile);
        fclose($messageFile);

        // Slaat bericht op in nieuw bestand
        $archive = fopen("guests.txt", "w");
        fwrite($archive, $user . $email . $content . $post);
        fclose($archive);
    }
}

function posting(){
    $messages = file_get_contents('guests.txt');
    if (isset($_SESSION["username"]))
        if (!isAdmin($_SESSION["username"])){
            $messages = noRemovebtn($messages);
            $messages = poster($messages);
        }
    if (!isset($_SESSION["username"]))
        $messages = noRemovebtn($messages);
    echo $messages;
}

function button1() {
    // Delete all comments          WORK IN PROGRESS
      $a = 'guests.txt';
      $b = file_get_contents('guests.txt');
      $c = preg_replace('guests.txt', '', $b);
      file_put_contents($a, $c);
}
?>