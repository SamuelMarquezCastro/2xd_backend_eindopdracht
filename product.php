<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

require_once __DIR__ . "/db.php";
$conn = getPDO();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$statement = $conn->prepare("SELECT * FROM products WHERE id = :id");
$statement->bindValue(":id", $id);
$statement->execute();
$product = $statement->fetch();

if (!$product) {
    die("Product niet gevonden");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>

        <nav class="nav">
            <ul>
                <li><a href="#">Search</a></li>
                <li><a href="index.php">Collectie</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="shoppingcart.php">Winkelmand</a></li>
            </ul>
        </nav>
    </header>

    <main>

    <section class="product-page">

<div class="product-image">
    <img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="">
</div>

<div class="product-info">
    <p class="product-category"><?php echo htmlspecialchars($product['category']); ?></p>
    <h1 class="product-title"><?php echo htmlspecialchars($product['title']); ?></h1>
    <p class="product-price">€<?php echo number_format((float)$product['price'], 2, ',', '.'); ?></p>

    <p class="product-description">
        <?php echo htmlspecialchars($product['description']); ?>
    </p>

    <form class="product-form" method="POST" action="addcart.php">
        <input type="hidden" name="product_id" value="<?php echo (int)$product['id']; ?>">

        <label for="quantity">Aantal</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">

        <button type="submit">In winkelmand</button>
    </form>
</div>

</section>

    </main>

</body>

</html>