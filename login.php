<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<main class="login-page">
<div class="logo-login">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>
        <h2>Inloggen</h2>

        <form method="POST" class="login-form">
            <label for="email">Email of gebruikersnaam</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Inloggen</button>
        </form>

        <p>Nog geen account? <a href="register.php">Registreer hier</a></p>
    </main>
</body>
</html>