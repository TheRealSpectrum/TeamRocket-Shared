<?php include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php include_once 'includes/functions.inc.php'; ?>

<?php
// Voegt al de functionaliteit van de pagina toe.
// Voegt header/footer van de pagina toe zodat die gelijk blijft op elke pagina.
    if (isset($_SESSION["useruid"])) {
        echo "<div class='usergreet'><p>Your are logged in as: " . $_SESSION["useruid"] . "<br>Welcome!</p></div>";
    }
    // Welkomst tekst voor de ingelogde user.
    getComments($conn);
    // functie die berichten vanuit de database laat zien.
?>

<?php include_once 'footer.php'; ?>