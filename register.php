<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="register-page">
<div class="logo-register">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>
        <h2>Account aanmaken</h2>

        <form method="POST" class="register-form">
            <label for="username">Gebruikersnaam</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Emailadres</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Bevestig wachtwoord</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Registreren</button>
        </form>

        <p>Heb je al een account? <a href="login.php">Inloggen</a></p>
    </main>
</body>
</html>