<?php
// Auteur : marwa
// Objectif : Validation d'une date saisie avec checkdate()
// Date : 19/10/2026

require 'config.php';
require 'includes/entete_inc.php';
require 'includes/menu_inc.php';

echo "<h2>Validation d'une date</h2>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jour  = (int) ($_POST['jour'] ?? 0);
    $mois  = (int) ($_POST['mois'] ?? 0);
    $annee = (int) ($_POST['annee'] ?? 0);

    if (checkdate($mois, $jour, $annee)) {
        echo "<p style='color:green'>La date $jour/$mois/$annee est valide.</p>";
    } else {
        echo "<p style='color:red'>La date $jour/$mois/$annee n'est pas valide.</p>";
    }
}
?>
<form method="post" action="date.php">
    <p>Jour : <input type="text" name="jour"></p>
    <p>Mois : <input type="text" name="mois"></p>
    <p>Année : <input type="text" name="annee"></p>
    <input type="submit" value="Vérifier">
</form>
<?php require 'includes/pied_inc.php'; ?>