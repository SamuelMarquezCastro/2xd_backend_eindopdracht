<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$conn = getPDO();




$categories = [
    "Slaapkamer" => [],
    "Woonkamer" => [],
    "Keuken & eetkamer" => [],
    "Badkamer" => []
];

$result = $conn->query("SELECT id, title, category, image FROM products ORDER BY id DESC");

$statement = $conn->query("SELECT id, title, category, image FROM products ORDER BY id DESC");
$rows = $statement->fetchAll();

foreach ($rows as $row) {
    if (isset($categories[$row['category']])) {
        $categories[$row['category']][] = $row;
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zara Home</title>
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
                <li><a href="#">Collectie</a></li>
                <?php if (isset($_SESSION['email'])): ?>
                    <li><a href="changepassword.php">Wachtwoord wijzigen</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>


                <li><a href="shoppingcart.php">Winkelmand</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-inner">
            <h2>A World Of Wonder</h2>
            <button>Bekijk de collectie</button>
        </div>
    </section>

    <main>
        <section class="collection">
            <h2>Collecties</h2>

            <div class="collection-category">
                <h3>Slaapkamer</h3>


                <div class="category-items">
                    <?php foreach ($categories["Slaapkamer"] as $product): ?>
                        <article class="item">
                            <a href="product.php?id=<?php echo $product['id']; ?>">
                                <img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                                <p><?php echo htmlspecialchars($product['title']); ?></p>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>



                <div class="collection-category">
                    <h3>Woonkamer</h3>

                    <div class="category-items">
                        <?php foreach ($categories["Woonkamer"] as $product): ?>
                            <article class="item">
                                <a href="product.php?id=<?php echo $product['id']; ?>">
                                    <img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                                    <p><?php echo htmlspecialchars($product['title']); ?></p>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>


                    <div class="collection-category">
                        <h3>Keuken & eetkamer</h3>

                        <div class="category-items">
                            <?php foreach ($categories["Keuken & eetkamer"] as $product): ?>
                                <article class="item">
                                    <a href="product.php?id=<?php echo $product['id']; ?>">
                                        <img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                                        <p><?php echo htmlspecialchars($product['title']); ?></p>
                                    </a>
                                </article>
                            <?php endforeach; ?>
                        </div>


                        <div class="category-items">
                            <?php foreach ($categories["Badkamer"] as $product): ?>
                                <article class="item">
                                    <a href="product.php?id=<?php echo $product['id']; ?>">
                                        <img src="img/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                                        <p><?php echo htmlspecialchars($product['title']); ?></p>
                                    </a>
                                </article>
                            <?php endforeach; ?>
                        </div>


        </section>

    </main>

</body>

</html>