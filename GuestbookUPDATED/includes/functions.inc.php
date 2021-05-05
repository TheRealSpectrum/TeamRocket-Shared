<?php
// Hier staan alle hoofd functies op één plek.
// Geeft de site zijn functionaliteit.
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Kijkt of de signup goed ingevuld is.
function emptyInputMessage($username, $message) {
    $result;
    if (empty($username) || empty($message)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Kijkt of het bericht goed ingevuld is.
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Kijkt of de username goed aangemaakt is.
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Kijkt of de email goed is.
function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
// Kijkt of je het wachtwoord goed hebt ingevuld.
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
// Kijkt of de usernaam en/of email al eerder is aangemaakt of geeft een error weer.
function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
// Voegt de gegevens die de user heeft aangemaakt op de signup pagina toe aan de database of geeft een error weer als dit niet lukt.
// Hashed het wachtwoord, wat ervoor zorgt dat het wachtwoord niet meer "normaal" te zien is.
function setComments($conn, $username, $date, $message) {
    $sql = "INSERT INTO comments (uid, date, message) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../message.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $date, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    exit();
}
// Voegt het bericht die de user heeft aangemaakt op de message pagina toe aan de database of geeft een error weer als dit niet lukt.
function getComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'><p>";
        echo $row['uid'] . "<br>";
        echo $row['date'] . "<br>";
        echo nl2br($row['message']) . "<br>";
        echo "</p>
            <form class='edit-form' method='POST' action='includes/editcomment.inc.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button type='submit' name='commentEdit'>Edit</button>
            </form>
            <form class='delete-form' method='POST' action='includes/deletecomment.inc.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <button type='submit' name='commentDelete'>Delete</button>
            </form>
            </div>";
    }
}
// Geeft de berichten vanuit de database weer.
// berichten hebben een edit en een delete button.
function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {

        $cid = $_POST["cid"];
        $uid = $_POST["uid"];
        $date = $_POST["date"];
        $message = $_POST["message"];

        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: ../index.php");
    }
}
// Edit gemaakte berichten.
function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {

        $cid = $_POST["cid"];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: ../index.php");
    }
}
// Delete gemaakte berichten.
?>








<?php

//$sql = "SELECT * FROM comments;";
//$result = mysqli_query($conn, $sql);
//$resultCheck = mysqli_num_rows($result);

//if ($resultCheck > 0) {
    //while ($row = mysqli_fetch_assoc($result)) {
     //   echo "<h2>" . $row['userID'] . "</h2><br>";
    //    echo "<p>" . $row['comment'] . "</p><br>";
    //}
//}
// Geeft de berichten weer vanuit database
?>