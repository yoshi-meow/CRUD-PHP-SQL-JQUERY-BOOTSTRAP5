<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<?php require_once("includes/header.php");?>


<!-- This for my Navigation Bar -->
<?php require_once("includes/nav_bar.php");?>


<!-- This for my DataTable -->
<?php require_once("includes/_table.php");?>



<?php require_once("includes/footer.php");?>