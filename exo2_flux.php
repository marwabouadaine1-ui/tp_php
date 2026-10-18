<?php
// Auteur : marwa
// Objectif : Structures de contrôle et boucles
// Date : 19/10/2026

require 'config.php';

// ===== Exercice 2.1 : if / elseif / else =====


echo "<h3>Exercice 2.1</h3>";

$tests = [18, 16, 15, 12, 10, 9, 0];
foreach ($tests as $n) {
    echo "Note $n : " . mention($n) . "<br>";
}

// ===== Exercice 2.2 : switch =====
echo "<h3>Exercice 2.2</h3>";

$mois = date("m");   // ex. "10" (chaîne de 2 caractères)

switch ($mois) {
    case "01":
        $nom = "Janvier";
        break;
    case "02":
        $nom = "Février";
        break;
    case "03":
        $nom = "Mars";
        break;
    case "04":
        $nom = "Avril";
        break;
    case "05":
        $nom = "Mai";
        break;
    case "06":
        $nom = "Juin";
        break;
    case "07":
        $nom = "Juillet";
        break;
    case "08":
        $nom = "Août";
        break;
    case "09":
        $nom = "Septembre";
        break;
    case "10":
        $nom = "Octobre";
        break;
    case "11":
        $nom = "Novembre";
        break;
    case "12":
        $nom = "Décembre";
        break;
    default:
        $nom = "Mois inconnu";
}

echo "Nous sommes en $nom.<br>";

/* Que se passe-t-il si on oublie un break dans un case ?
   -> ta réponse ici */

// ===== Exercice 2.3 : Boucles =====
echo "<h3>Exercice 2.3</h3>";

// --- Question 1 : triangle avec deux boucles for imbriquées ---
echo "<pre>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "\n";
}
echo "</pre>";

// --- Question 2 : while de 0 à 20 par pas de 2, 10 en gras ---
$n = 0;
while ($n <= 20) {
    if ($n == 10) {
        echo "<b>$n</b> ";
    } else {
        echo "$n ";
    }
    $n += 2;
}
echo "<br>";

// --- Question 3 : for + continue, nombres pairs de 0 à 10 ---
for ($k = 0; $k <= 10; $k++) {
    if ($k % 2 != 0) {
        continue;   // saute les nombres impairs
    }
    echo "$k ";
}
echo "<br>";

// --- Question 4 : while + switch + break 2 ---
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;      // sort uniquement du switch
        case 10:
            echo "At 10; quitting<br>";
            break 2;    // sort du switch ET de la boucle
        default:
            break;      // rien à afficher pour les autres valeurs
    }
    $i++;
}

// --- Question 5 : do-while (réécriture de la question 2) ---
$n = 0;
do {
    if ($n == 10) {
        echo "<b>$n</b> ";
    } else {
        echo "$n ";
    }
    $n += 2;
} while ($n <= 20);
echo "<br>";

/* Différence essentielle entre while et do-while ?
   -> ta réponse ici */