<?php
// Auteur : marwa
// Objectif : Traitement du formulaire POST (validation des notes)
// Date : 19/10/2026

require 'config.php';

echo "<h2>Résultat de la saisie</h2>";

// 1. Vérifier que les champs existent et ne sont pas vides
if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])
    || empty($_POST['nom'])
    || $_POST['note_info'] === ''
    || $_POST['note_math'] === '') {
    echo "<p style='color:red'>Erreur : tous les champs sont obligatoires.</p>";
    exit;
}

$nom = trim($_POST['nom']);
$note_info = $_POST['note_info'];
$note_math = $_POST['note_math'];

// 2. Vérifier que ce sont des nombres compris entre NOTE_MIN et NOTE_MAX
if (!is_numeric($note_info) || !is_numeric($note_math)
    || $note_info < NOTE_MIN || $note_info > NOTE_MAX
    || $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
    echo "<p style='color:red'>Erreur : les notes doivent être comprises entre "
         . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    exit;
}

// 3. Tout est valide : récapitulatif protégé par htmlspecialchars()
echo "<p>Nom : " . htmlspecialchars($nom) . "</p>";
echo "<p>Note info : " . htmlspecialchars($note_info) . "</p>";
echo "<p>Note math : " . htmlspecialchars($note_math) . "</p>";

// ===== Exercice 5.1 : Écriture dans un fichier CSV =====
$fichier = fopen("data/notes.csv", "a");   // "a" = append (ajout à la fin)

if ($fichier === false) {
    echo "<p style='color:red'>Erreur : impossible d'ouvrir le fichier.</p>";
    exit;
}

fputcsv($fichier, [$nom, $note_info, $note_math], ";");
fclose($fichier);

echo "<p style='color:green'>Données enregistrées dans data/notes.csv.</p>";

/* Que se passerait-il avec le mode "w" au lieu de "a" ?
   -> Avec "w" (write), le fichier est vidé (écrasé) à chaque ouverture :
      on perd toutes les anciennes lignes et il ne reste que la dernière
      saisie. Avec "a" (append), les nouvelles lignes sont ajoutées à la fin
      du fichier, sans effacer les anciennes. */