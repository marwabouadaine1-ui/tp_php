<?php
// Auteur : marwa
// Objectif : Lecture du fichier CSV et affichage des notes
// Date : 19/10/2026

require 'config.php';

echo "<h2>Liste des apprenants</h2>";

$chemin = "data/notes.csv";

// 1. Tester l'existence du fichier
if (!file_exists($chemin)) {
    echo "<p style='color:red'>Erreur : le fichier $chemin n'existe pas.</p>";
    exit;
}

// 2. Ouvrir en lecture et gérer l'échec
$fichier = fopen($chemin, "r");
if ($fichier === false) {
    echo "<p style='color:red'>Erreur : impossible d'ouvrir le fichier.</p>";
    exit;
}

// 3 et 4. Lire ligne par ligne et afficher le tableau
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";

$sommeMoyennes = 0;
$nb = 0;

while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {
    $nom = $ligne[0];
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];
    $moyenne = ($info + $math) / 2;

    $sommeMoyennes += $moyenne;
    $nb++;

    $style = ($moyenne < SEUIL) ? " style='color:red'" : "";
    echo "<tr$style>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>$info</td><td>$math</td>";
    echo "<td>" . round($moyenne, 2) . "</td>";
    echo "<td>" . mention($moyenne) . "</td>";
    echo "</tr>";
}

echo "</table>";
fclose($fichier);

// 5. Moyenne générale de la classe
if ($nb > 0) {
    echo "<p><b>Moyenne générale de la classe :</b> " . round($sommeMoyennes / $nb, 2) . "</p>";
} else {
    echo "<p>Aucun apprenant enregistré.</p>";
}

// ===== Exercice 5.3 : Lecture « bas niveau » =====
echo "<h3>Exercice 5.3 : fgets + explode</h3>";

$fichier = fopen($chemin, "r");
if ($fichier === false) {
    echo "<p style='color:red'>Erreur : impossible d'ouvrir le fichier.</p>";
    exit;
}

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nom</th><th>Info</th><th>Math</th></tr>";

while (!feof($fichier)) {
    $ligne = fgets($fichier);
    $ligne = trim($ligne);        // enlève le \n de fin de ligne

    if ($ligne === "") {
        continue;                 // ignore la dernière ligne vide
    }

    $champs = explode(';', $ligne);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($champs[0]) . "</td>";
    echo "<td>" . htmlspecialchars($champs[1]) . "</td>";
    echo "<td>" . htmlspecialchars($champs[2]) . "</td>";
    echo "</tr>";
}

echo "</table>";
fclose($fichier);

/* Comparaison fgetcsv() vs fgets() + explode() :
   -> fgetcsv() : ta réponse (avantages / inconvénients)
   -> fgets() + explode() : ta réponse (avantages / inconvénients) */