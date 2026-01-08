<?php
require_once __DIR__ . "/db.php";

$error = "";
$success = "";

if (!empty($_POST)) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $passwordRaw = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($passwordRaw !== $confirm) {
        $error = "Wachtwoorden komen niet overeen.";
    } else {
        $options = ['cost' => 14];
        $password = password_hash($passwordRaw, PASSWORD_DEFAULT, $options);

        $conn = getPDO();

        $check = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $check->bindValue(":email", $email);
        $check->execute();

        if ($check->fetch()) {
            $error = "Dit emailadres is al geregistreerd.";
        } else {
            $query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $query->bindValue(":username", $username);
            $query->bindValue(":email", $email);
            $query->bindValue(":password", $password);
            $query->execute();

            $success = "Account aangemaakt. Je kan nu inloggen.";
        }
    }
}
?>







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
            <?php if ($error): ?>
                <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p style="color:green;"><?php echo htmlspecialchars($success); ?></p>
            <?php endif; ?>


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