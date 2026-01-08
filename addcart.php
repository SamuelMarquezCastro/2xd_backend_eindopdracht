<?php
session_start();

if (!isset($_POST['product_id'], $_POST['quantity'])) {
    header("Location: index.php");
    exit;
}

$productId = (int) $_POST['product_id'];
$quantity  = (int) $_POST['quantity'];

if ($productId <= 0) {
    header("Location: index.php");
    exit;
}

if ($quantity < 1) {
    $quantity = 1;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$productId])) {
    $_SESSION['cart'][$productId] += $quantity;
} else {
    $_SESSION['cart'][$productId] = $quantity;
}

header("Location: shoppingcart.php");
exit;
