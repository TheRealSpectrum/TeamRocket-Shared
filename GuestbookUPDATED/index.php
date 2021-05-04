<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>


<?php
    if (isset($_SESSION["useruid"])) {
        echo "<p>Hello there " . $_SESSION["useruid"] . " !</p>";
    }
?>

<div class="messagecontainer">

<?php

$sql = "SELECT * FROM comments;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row['userID'] . "</h2><br>";
        echo "<p>" . $row['comment'] . "</p><br>";
    }
}
// Echoed database results.
?>

</div>


<?php include_once 'footer.php'; ?>