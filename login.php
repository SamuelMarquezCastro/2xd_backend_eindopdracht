<?php

function canLogin($email, $password)
{
    $conn = new PDO('mysql:host=localhost;dbname=Zara', "root", "");
    $statement = $conn->prepare("select * from users where email = :email");
    $statement->bindValue(":email", $email);
    $statement->execute();

    $user = $statement->fetch();

    if (!$user) {
        return false;
    }

    $hash = $user["password"];

    if (password_verify($password, $hash)) {
        return true;
    } else {
        return false;
    }
}


if (!empty($_POST)) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (canLogin($email, $password)) {

        session_start();
        $_SESSION["email"] = $email;
        header("Location: index.php");
        exit;
    } else {

        $error = true;
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="login-page">
        <div class="logo-login">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>
        <h2>Inloggen</h2>

        <form method="POST" class="login-form">
            <?php if (!empty($error)): ?>
                <p style="color:red;">Email of wachtwoord is verkeerd.</p>
            <?php endif; ?>

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