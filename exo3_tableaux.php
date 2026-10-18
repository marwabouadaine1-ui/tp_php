<?php
// Auteur : marwa
// Objectif : Manipulation des tableaux
// Date : 19/10/2026

require 'config.php';

// ===== Exercice 3.1 : Création =====
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["PHP", "Base de données", "Réseaux"];

echo "<h3>Exercice 3.1</h3>";

// Avec foreach
echo "Modules (foreach) : ";
foreach ($modules as $module) {
    echo "$module, ";
}
echo "<br>";

// Avec les indices
echo "Modules (indices) : ";
for ($i = 0; $i < count($modules); $i++) {
    echo $modules[$i] . ", ";
}
echo "<br>";

// ===== Exercice 3.2 : Affichage HTML =====
echo "<h3>Exercice 3.2</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";

foreach ($notes as $nom => $note) {
    $style = ($note < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style>";
    echo "<td>$nom</td><td>$note</td><td>" . mention($note) . "</td>";
    echo "</tr>";
}

echo "</table>";

// ===== Exercice 3.3 : Statistiques =====
echo "<h3>Exercice 3.3</h3>";

// --- 1. Calcul avec une boucle (sans array_sum) ---
$somme = 0;
$nb = 0;
$meilleure = null;
$faible = null;

foreach ($notes as $note) {
    $somme += $note;
    $nb++;
    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }
    if ($faible === null || $note < $faible) {
        $faible = $note;
    }
}
$moyenne = $somme / $nb;

echo "Somme : $somme<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : $meilleure<br>";
echo "Plus faible note : $faible<br>";

// --- 2. Vérification avec les fonctions PHP ---
echo "<b>Vérification :</b><br>";
echo "array_sum : " . array_sum($notes) . "<br>";
echo "count : " . count($notes) . "<br>";
echo "max : " . max($notes) . "<br>";
echo "min : " . min($notes) . "<br>";

// --- 3. Effectifs par mention ---
$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}

echo "<b>Effectifs par mention :</b><br>";
foreach ($effectifs as $m => $nombre) {
    echo "$m : $nombre<br>";
}

// ===== Exercice 3.4 : Tri =====
echo "<h3>Exercice 3.4</h3>";

function afficher($tab) {
    foreach ($tab as $cle => $valeur) {
        echo "$cle : $valeur<br>";
    }
}

// 1. Noms croissants (ksort)
$t = $notes;
ksort($t);
echo "<b>Noms croissants (ksort)</b><br>";
afficher($t);

// 2. Notes décroissantes (arsort)
$t = $notes;
arsort($t);
echo "<b>Notes décroissantes (arsort)</b><br>";
afficher($t);

// 3. Noms décroissants (krsort)
$t = $notes;
krsort($t);
echo "<b>Noms décroissants (krsort)</b><br>";
afficher($t);

// 4. Notes croissantes (asort)
$t = $notes;
asort($t);
echo "<b>Notes croissantes (asort)</b><br>";
afficher($t);

/* Quelle fonction de tri utiliser sur un tableau indexé comme $modules ?
   -> ta réponse ici */

// ===== Exercice 3.5 : Opérateurs de tableaux =====
echo "<h3>Exercice 3.5</h3>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// PRÉDICTIONS (écris ta réponse avant de tester) :
// $a + $b   -> false
// $a == $b  -> false
// $a === $b -> true

echo "<b>\$a + \$b :</b><br>";
print_r($a + $b);
echo "<br>";

echo "<b>\$a == \$b :</b> ";
var_dump($a == $b);
echo "<br>";

echo "<b>\$a === \$b :</b> ";
var_dump($a === $b);
echo "<br>";

/* Explication des différences :
   -> ta réponse ici */