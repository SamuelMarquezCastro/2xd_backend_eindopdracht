<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmand</title>
    <link rel="stylesheet" href="style.css?v=1">
</head>
<body>

    <header class="header">
        <div class="logo">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>

        <nav class="nav">
            <ul>
                <li><a href="index.php">Collectie</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="shoppingcart.php">Winkelmand</a></li>
            </ul>
        </nav>
    </header>

    <main class="cart-page">
        <h2>Winkelmand</h2>

        <section class="cart-items">
            <article class="cart-item">
                <img src="img/placeholder.png" alt="">
                <div class="cart-info">
                    <p><strong>Linnen dekbedovertrek</strong></p>
                    <p>Aantal: 1</p>
                    <p>Prijs: €89,99</p>
                </div>
                <button>Verwijder</button>
            </article>

            <article class="cart-item">
                <img src="img/placeholder.png" alt="">
                <div class="cart-info">
                    <p><strong>Geurkaars</strong></p>
                    <p>Aantal: 2</p>
                    <p>Prijs: €12,99</p>
                </div>
                <button>Verwijder</button>
            </article>
        </section>

        <section class="cart-summary">
            <p><strong>Totaal:</strong> €115,97</p>
            <button>Afrekenen</button>
        </section>
    </main>

</body>
</html>
