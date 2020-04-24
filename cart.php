<!-- 
    This page will contain a listing of the items in the user's cart. 
    If the user is not logged in, redirect them to login.php. 
    Otherwise, list all of the items in the user's cart by accessing $_SESSION['cart']. 
    You will also include number input boxes to aside each item that will
    , by default, contain the quantity of the item in the cart. 
    The user may change these values by updating the numbers in the field and selecting a button entitled "Update Cart."
    You will also include the subtotal of all of the products in the cart in a monetary format and a button to allow the user to empty their cart. 
-->

<?php

require_once "utilities.php";
require_once "connect.php";

myVarDump($_SESSION, "Current Session Variables");

$cartedProducts = $_SESSION['cart'];

function displayCart($cartedProducts) {
    myVarDump($cartedProducts, "The Cart");
}
?>

<!DOCTYPE HTML>
    <html>
        <?php require_once "head.php"; ?>
        <body>
            <?php require_once "nav.php"; ?>

            <div class = "container">
                <?php require_once "header.php"; ?>
                <?php displayCart($cartedProducts); ?>
            </div>
                <?php require_once "footer.php"; ?>

<!-- eof -->