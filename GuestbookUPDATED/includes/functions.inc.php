<?php
// Hier staan alle hoofd functies op één plek.
// Deze functies geven site zijn functionaliteit.
function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) {
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
function setUrl($conn, $username, $link, $date) {
    $sql = "INSERT INTO memes (uid, link, date) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../memes.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $link, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../memes.php?error=none");
    exit();
}
// Voegt de url die de user heeft aangemaakt op de memes pagina toe aan de database of geeft een error weer als dit niet lukt.
function getComments($conn) {
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE usersid='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
            echo "<div class='comment-box'>";
            echo "<h2>" . $row2['usersUid'] . "</h2><br>";
            echo "<h4>" . $row['date'] . "</h4><br>";
            echo nl2br("<p>" . $row['message'] . "</p>");
            echo "
            <form class='edit-form' method='POST' action='includes/editcomment.inc.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='uid' value='".$row['uid']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='message' value='".$row['message']."'>
                <button type='submit' name='commentEdit'>Edit</button>
            </form>
            <form class='comment-delete-form' method='POST' action='includes/deletecomment.inc.php'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <button type='submit' name='commentDelete'>Delete</button>
            </form>
            </div>";
        }
    }
}
// Geeft de berichten vanuit de database weer.
// berichten hebben een edit en een delete button.
// berichten zijn gebonden aan logged in user.
function getMemes($conn) {
    $sql = "SELECT * FROM memes ORDER BY likecount DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2 = "SELECT * FROM users WHERE usersid='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
            echo "<div class='meme-box'>";
            echo "<h2>" . $row2['usersUid'] . "</h2><br>";
            echo "<h4>" . $row['date'] . "</h4><br>";
            echo nl2br("<img src='" . $row['link'] . "'>");
            echo "<p>" . $row['likecount'] . "</p><br>";
            echo "<form class='delete-form' method='POST' action='includes/deletememe.inc.php'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' name='linkDelete'>Delete</button>
                  </form>";
                  echo "<form class='vote-form' method='POST' action='includes/votes.inc.php'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <button type='submit' name='upvote'>
                        <i class='far fa-thumbs-up'></i>
                    </button>
                    <button type='submit' name='downvote' class='red'>
                        <i class='far fa-thumbs-down'></i>
                    </button>
                  </form>";
            echo "</div>";
        }
    }
}
// Geeft de Memes vanuit de database weer.
// Memes hebben een delete button. 
// Memes hebben een up en downvote optie.
// Memes zijn gebonden aan logged in user.
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
// Edit gemaakte berichten in de database.
function deleteComments($conn) {
    if (isset($_POST['commentDelete'])) {

        $cid = $_POST["cid"];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: ../index.php");
    }
}
// Delete gemaakte berichten uit de database.
function deleteMemes($conn) {
    if (isset($_POST['linkDelete'])) {

        $id = $_POST["id"];

        $sql = "DELETE FROM memes WHERE id='$id'";
        $result = $conn->query($sql);
        header("Location: ../memes.php");
    }
}
// Delete gemaakte Memes uit de database.
function editVotes($conn) {
    if (isset($_POST['upvote'])) {

        $upvote = $_POST["upvote"];
        $id = $_POST["id"];

        $sql = "UPDATE memes SET likecount=likecount+1 WHERE id='$id'";
        $result = $conn->query($sql);
        header("Location: ../memes.php");
    } else if (isset($_POST['downvote'])) {

        $downvote = $_POST['downvote'];
        $id = $_POST["id"];
        $sql = "UPDATE memes SET likecount=likecount-1 WHERE id='$id'";
        $result = $conn->query($sql);
        header("Location: ../memes.php");
    }
}
// Veranderd de votecount in de database als je op de up of downvote drukt.
?>