<?php
// Auteur : marwa
// Objectif : Formulaire de connexion (session)
// Date : 19/10/2026

session_start();   // doit être la toute première instruction

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['login'])) {
    $_SESSION['login'] = trim($_POST['login']);
    header("Location: profil.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form action="login.php" method="post">
        <p>Login : <input type="text" name="login"></p>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>