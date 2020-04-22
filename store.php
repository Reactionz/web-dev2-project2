<!-- This page will contain the products that you are selling. 
If the user is not logged in, redirect them to login.php. 
Otherwise, list all of the products that you are selling. 
You should display the product information as you did in the previous assignments, 
but in addition, you will have an "Add to Cart" button. 
If $_POST['item'] is a valid ID, add it to $_SESSION['cart']. 
You should keep the item's information as well as the quantity of the item that has been added to the cart. 
If the item was successfully added to the cart, display a message that says so. -->
<?php

require_once "utilities.php";
require_once "connect.php";

// If you're not logged in
if ( !isset($_SESSION["loggedin"]) ) {
    header("location: home.php");
}
DEFINE("STYLESHEET", "project2.css");
DEFINE("USERSTORE", "Lawrence's Store");

$userName = ( isset($_SESSION['username']) ? $_SESSION['username'] : null);
$id = '';

$result = $conn -> query("SELECT * From Products");

$products_arr = $result -> fetch_all(MYSQLI_ASSOC);

$result -> free();

// myVarDump($products_arr);

// TODO: Alter classes for Bootstrap 4
function createProducts($product_arr) {
    for ($i = 0; $i < sizeof($product_arr); $i++) {
        echo "<div class='product-item'>";
        foreach ($product_arr[$i] as $key => $value) {
            switch ($key) {
                case "id":
                    $id = $value;
                    break;
                case "name":
                    echo `<div class='product-name'> <b> ${value} </b> </div>`;
                    break;
                case "img":
                    echo "<div> <img class = 'product-img img-thumbnail' src='", $value, "'> </div>";
                    break;
                case "description":
                    echo "<div class='product-desc'><p>", $value, "</p> </div>";
                    break;
                case "price":
                    echo "<div class='product-price'>$", $value, "</p></div>";
                    break;
                case "rating":
                    echo "<div class='product-rating'><p>", str_repeat("*", $value), "</p> </div>";
                    break;
                case "stock":
                    echo "<div class='product-stock'><p>", checkStock($value), "</p> </div>";
                    break;
                default:
                    break;
            }
        }
        /*<button name="item" id="item" value="<?= $items['id'] ?>">Add to Cart</button> */

        echo "<button type = 'submit' class = 'btn btn-primary' value = '$id' name = 'product-item'> Add to Cart </button>";
        echo "</div>";
    }
}

function checkStock($a) {
    if($a > 0) {
        return 'In Stock';
    } else {
        return 'Out of Stock';
    }
    return $a > 0 ? 'In Stock' : 'Out of Stock';
}



$conn -> close();
?>

<!DOCTYPE HTML> 
    <html>
        <?php require_once "head.php" ?>
        <body>
            <?php require_once "nav.php"; ?>
            <?php require_once "header.php"; ?>

            <div class = "container">
                <div class = "products">
                    <?= createProducts($products_arr) ?>
                </div>

            </div>
            <?php require_once "footer.php"; ?>
<!-- eof -->
                    
