<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

require_once __DIR__ . "/db.php";

$error = "";
$success = "";

if (!empty($_POST)) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        $error = "Nieuwe wachtwoorden komen niet overeen.";
    } else {
        $conn = getPDO();

        $statement = $conn->prepare("SELECT password FROM users WHERE email = :email");
        $statement->bindValue(":email", $_SESSION['email']);
        $statement->execute();

        $user = $statement->fetch();

        if (!$user || !password_verify($current, $user['password'])) {
            $error = "Huidig wachtwoord is fout.";
        } else {
            $options = ['cost' => 14];
            $newHash = password_hash($new, PASSWORD_DEFAULT, $options);

            $update = $conn->prepare("UPDATE users SET password = :password WHERE email = :email");
            $update->bindValue(":password", $newHash);
            $update->bindValue(":email", $_SESSION['email']);
            $update->execute();

            $success = "Wachtwoord succesvol aangepast.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord wijzigen</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="login-page">
        <div class="logo-login">
            <img src="img/Zara_Home_logo_2023.png" alt="Zara Home logo">
        </div>

        <h2>Wachtwoord wijzigen</h2>

        <?php if ($error): ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color:green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>


        <form method="POST" class="login-form">
            <label for="current_password">Huidig wachtwoord</label>
            <input type="password" id="current_password" name="current_password" required>

            <label for="new_password">Nieuw wachtwoord</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="confirm_password">Bevestig nieuw wachtwoord</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Opslaan</button>
        </form>

        <p><a href="index.php">Terug naar home</a></p>
    </main>

</body>

</html>