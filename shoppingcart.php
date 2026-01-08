<?php
session_start();

require_once __DIR__ . "/db.php";

$cart = $_SESSION['cart'] ?? [];

$conn = getPDO();

$products = [];
$total = 0;

if (!empty($cart)) {
    $ids = array_keys($cart);
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    $statement = $conn->prepare(
        "SELECT id, title, price, image FROM products WHERE id IN ($placeholders)"
    );
    $statement->execute($ids);

    while ($row = $statement->fetch()) {
        $products[$row['id']] = $row;
    }

    foreach ($cart as $id => $qty) {
        if (isset($products[$id])) {
            $total += $products[$id]['price'] * $qty;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmand</title>
    <link rel="stylesheet" href="style.css?v=3">
</head>
<body>

<header class="header">
    <div class="logo">
        <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
    </div>

    <nav class="nav">
        <ul>
            <li><a href="index.php">Collectie</a></li>
            <li><a href="shoppingcart.php">Winkelmand</a></li>
        </ul>
    </nav>
</header>

<main class="cart-page">
    <h2>Winkelmand</h2>

    <?php if (empty($cart)): ?>
        <p>Je winkelmand is leeg.</p>
    <?php else: ?>

        <section class="cart-items">
            <?php foreach ($cart as $id => $qty): ?>
                <?php if (!isset($products[$id])) continue; ?>

                <article class="cart-item">
                    <img src="img/<?php echo htmlspecialchars($products[$id]['image']); ?>" alt="">

                    <div class="cart-info">
                        <p><strong><?php echo htmlspecialchars($products[$id]['title']); ?></strong></p>
                        <p>Aantal: <?php echo (int)$qty; ?></p>
                        <p>Prijs: €<?php echo number_format($products[$id]['price'], 2, ',', '.'); ?></p>
                    </div>

                    <a href="removecart.php?id=<?php echo (int)$id; ?>">
                        <button type="button">Verwijder</button>
                    </a>
                </article>

            <?php endforeach; ?>
        </section>

        <section class="cart-summary">
            <p><strong>Totaal:</strong> €<?php echo number_format($total, 2, ',', '.'); ?></p>
            <button type="button">Afrekenen</button>
        </section>

    <?php endif; ?>
</main>

</body>
</html>
