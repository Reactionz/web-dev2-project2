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
    exit;
}


$userName = ( isset($_SESSION['username']) ? $_SESSION['username'] : null);
$id = '';

$result = $conn -> query("SELECT * From Products");

$products_arr = $result -> fetch_all(MYSQLI_ASSOC);

$result -> free();

// myVarDump($products);
// TODO: Alter classes for Bootstrap 4
function createProducts($product_arr) {
    for ($i = 0; $i < sizeof($product_arr); $i++) {
        echo "<form method = 'POST' action = 'store.php?page=cart'>";
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
                    echo "<div class = 'product-img-container'> <img class = 'product-img img-thumbnail' src = '", $value, "'> </div>";
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
        // Wrap the 2D array value with curly braces or it won't be able to find the column i'm attempting to reference.
        /*<button name="item" id="item" value="<?= $items['id'] ?>">Add to Cart</button> */
        echo "<button type = 'submit' class = 'btn btn-primary' value = '{$product_arr[$i]['id']}' name = 'product-id'> Add to Cart </button>";
        echo "</div>";
        echo "</form>";
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

if ( isset ( $_POST['product-id'] ) ) {
    myVarDump($_POST);
    // I like to sanitize for this even if I'm not sure if it does anything lol.
    $_POST = array_map("sanitize", $_POST);
    
    $statement = $conn -> prepare("SELECT * FROM Products WHERE id = ?");
    $statement -> bind_param("s", $_POST['product-id']);
    $statement -> execute();
    // Get the Result
    $result = $statement->get_result();
    myVarDump($_SESSION, "Session Global");
    $product = $result->fetch_assoc();
    // If the product exists in the database.

    if ( !empty( $product ) ) {
        // If the cart is empty
        if( empty($_SESSION['cart']) ) {
            $_SESSION['cart'][0] = $product;
        } else {
            array_push($_SESSION['cart'], $product);
        }
    }
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
                    
