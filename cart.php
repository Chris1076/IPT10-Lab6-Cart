<?php
session_start();
require "products.php";
// TODO: Display items in the cart
$cart = $_SESSION['cart'];
$cartItems = [];
foreach($cart as $id){
    foreach($products as $product){
        if($id == $product['id']){
            array_push($cartItems, $product);
        }
        
    }
}
// for($i = 0; $i <= count($cart); $i++){
//     if($cart[$i] == $products[$i]['id']){
//         array_push($cartItems, $products[$i]);
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <!-- TODO: List products added to the cart -->
        <?php foreach ($cartItems as $item): ?>
            <li>
                <?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP
                <!-- <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="">
                    <button type="submit">Add to Cart</button>
                </form> -->
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="reset-cart.php">Clear my cart</a>
    <a href="place-order.php">Place the order</a>
</body>
</html>
