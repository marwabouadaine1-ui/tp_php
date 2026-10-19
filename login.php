<?php
// Auteur : marwa
// Objectif : Formulaire de connexion (session + cookie)
// Date : 19/10/2026

session_start();   // doit être la toute première instruction

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['login'])) {
    $login = trim($_POST['login']);
    $_SESSION['login'] = $login;

    // Cookie simple valable 24 heures
$donnees = json_encode(["login" => $login, "date" => date("d/m/Y H:i")]);
setcookie("dernier_login", $donnees, time() + 86400, "/");
    header("Location: profil.php");
    exit;
}

// Pré-remplir le champ avec le cookie s'il existe
$dernier = '';
$derniere_date = '';
if (isset($_COOKIE['dernier_login'])) {
    $infos = json_decode($_COOKIE['dernier_login'], true);
    $dernier = $infos['login'] ?? '';
    $derniere_date = $infos['date'] ?? '';
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
        <p>Login : <input type="text" name="login" value="<?php echo htmlspecialchars($dernier); ?>"></p>
        <input type="submit" value="Se connecter">
    </form>
    <?php if ($derniere_date): ?>
    <p>Dernière connexion : <?php echo htmlspecialchars($derniere_date); ?></p>
<?php endif; 
?>
</body>
</html>