<?php
// Auteur : marwa
// Objectif : Page de profil protégée par session
// Date : 19/10/2026

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h2>Bienvenue <?php echo htmlspecialchars($_SESSION['login']); ?> !</h2>
    <p><a href="deconnexion.php">Se déconnecter</a></p>
</body>
</html>