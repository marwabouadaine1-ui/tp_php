<?php
// Auteur : marwa
// Objectif : Traitement du formulaire GET
// Date : 19/10/2026

$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';
$sexe = $_GET['sexe'] ?? '';

if ($sexe == "M") {
    $civilite = "Monsieur";
} else {
    $civilite = "Madame";
}

echo "Bonjour $civilite " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom);