<?php
// Auteur : marwa
// Objectif : Sérialisation des résultats (JSON et serialize)
// Date : 19/10/2026

require 'config.php';

echo "<h2>Export des résultats</h2>";

$chemin = "data/notes.csv";

if (!file_exists($chemin)) {
    echo "<p style='color:red'>Erreur : le fichier $chemin n'existe pas.</p>";
    exit;
}

// 1. Construire un tableau associatif des résultats à partir du CSV
$resultats = [];
$fichier = fopen($chemin, "r");

while (($ligne = fgetcsv($fichier, 1000, ";")) !== false) {
    $info = (float) $ligne[1];
    $math = (float) $ligne[2];

    $resultats[] = [
        "nom"     => $ligne[0],
        "notes"   => ["info" => $info, "math" => $math],
        "moyenne" => ($info + $math) / 2
    ];
}
fclose($fichier);

// 2. Écrire dans data/notes.json
$json = json_encode($resultats, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents("data/notes.json", $json);
echo "<p style='color:green'>Fichier data/notes.json créé.</p>";

// 3. Relire et afficher avec print_r
$contenu = file_get_contents("data/notes.json");
$tableau = json_decode($contenu, true);

echo "<h3>Relecture (json_decode + print_r)</h3>";
echo "<pre>";
print_r($tableau);
echo "</pre>";

// 4. Comparaison serialize() et json_encode()
echo "<h3>serialize()</h3>";
echo "<pre>" . htmlspecialchars(serialize($resultats)) . "</pre>";

echo "<h3>json_encode()</h3>";
echo "<pre>" . htmlspecialchars(json_encode($resultats)) . "</pre>";

/* Quel format est directement exploitable par une application JavaScript ?
   -> ta réponse ici */

/* Comparaison serialize() vs json_encode() :
   -> ta réponse ici */