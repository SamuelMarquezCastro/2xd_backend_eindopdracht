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
                <li><a href="#">Winkelmand</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section class="product-page">

            <div class="product-image">
                <img src="img/placeholder.png" alt="">
            </div>

            <div class="product-info">
                <p class="product-category">Slaapkamer</p>
                <h1 class="product-title">Kersthart dienblad</h1>
                <p class="product-price">€45,99</p>

                <p class="product-description">
                Kersthart dienblad voor in de slaapkamer
                </p>

                <form class="product-form" method="POST">
                    <label for="size">Kies Kleur</label>
                    <select id="size" name="size">
                        <option value="Rood">Rood</option>
                        <option value="Blauw">Blauw</option>
                        <option value="Groen">Groen</option>
                    </select>

                    <label for="quantity">Aantal</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">

                    <button type="submit">In winkelmand</button>
                </form>
            </div>

        </section>

    </main>

</body>
</html>
