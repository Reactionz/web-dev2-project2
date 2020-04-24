<!-- This will be a generic home page that will display your navigation bar (from nav.php) and a different header based on whether or not the user is logged in. 
If a user is logged in, your header will say "Welcome, $_SESSION['user_fname']!" 
Otherwise, your header will say "Welcome, guest!"
 -->
<?php 

require_once "utilities.php";
require_once "connect.php";

$userName = ( isset($_SESSION['username']) ? $_SESSION['username'] : null);

?>

<!DOCTYPE HTML>
    <html>
        <?php require_once "head.php"; ?>
        <body>
            <?php require_once "nav.php"; ?>

            <div class="container">
            <?php require_once "header.php"; ?>
            </div>
            <?php require_once "footer.php"; ?>
<!-- eof -->