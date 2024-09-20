<?php
session_start();
require "products.php";
$order_code = uniqid();
$orderfile = fopen($order_code.".txt", "a");
$cart = $_SESSION['cart'];
$cartItems = [];
foreach($cart as $id){
    foreach($products as $product){
        if($id == $product['id']){
            array_push($cartItems, $product);
        }
    }
}
fwrite($orderfile, "Order Code: ".$order_code."\n");
$date = date('Y-m-d H:i:s');
fwrite($orderfile, "Date & Time ordered: ".$date."\n");
foreach($cartItems as $orders){
    $strr = implode('-------------', $orders)."\n";
    fwrite($orderfile, $strr);
}
$total = 0;
foreach($cartItems as $orders){
    $total += $orders['price'];
}
fwrite($orderfile, "Total: ".$total." PHP");
// TODO: Save order data to orders-[ORDER_CODE].txt
// Get the order from the cart (Session variable)
// Map the order Ids from the $products variable
// Compute the total
// Write the orders in a file
fclose($orderfile);
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <!-- TODO: Display order summary -->
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
        <h6>Total: <?php echo $total?> PHP</h6>
        <a href="reset-cart.php">Go back to index</a>
    </ul>
</body>
</html>
