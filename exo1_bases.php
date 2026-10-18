<?php
// Auteur : marwa
// Objectif : Exercices sur les bases de PHP
// Date : 17/10/2026

require 'config.php';

echo ETABLISSEMENT . "<br>";
echo NOTE_MIN . "<br>";
echo NOTE_MAX . "<br>";
echo SEUIL . "<br>";

var_dump(defined('SEUIL'));
echo "<br>";
var_dump(defined('INCONNUE'));
echo "<br>";

// echo INCONNUE;   // décommente pour tester l'erreur

/* Que se passe-t-il si on affiche une constante non définie ?
   -> ta réponse ici */

/* Différence entre const et define() ?
   -> ta réponse ici */

// ===== Exercice 1.1 : Noms de variables =====

// $x       -> valide : commence par une lettre
// $_x      -> valide : commence par un underscore
// $2x      -> invalide : commence par un chiffre
// $x-y     -> invalide : le tiret '-' n'est pas autorisé (PHP le lit comme une soustraction)
// $Prix_HT -> valide : lettres et underscore autorisés
// $prix ht -> invalide : l'espace n'est pas autorisé
// $état    -> valide : PHP accepte les caractères accentués (octets 128-255)

$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "ok";

echo "<h3>Exercice 1.1</h3>";
echo "x = $x, _x = $_x, Prix_HT = $Prix_HT, état = $état<br>";

// $a et $A : PHP est sensible à la casse
$a = "minuscule";
$A = "MAJUSCULE";
echo "a = $a<br>";
echo "A = $A<br>";

// ===== Exercice 1.3 : Calcul =====

$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "<h3>Exercice 1.3</h3>";
echo "Le prix TTC du produit est de $prix_ttc €.<br>";

// ===== Exercice 1.4 : Types et conversions =====
echo "<h3>Exercice 1.4</h3>";

// --- Question 1 : cast en string ---
$test = 42;
$test = (string) $test;
var_dump($test);   // string(2) "42"
echo "<br>";

// --- Question 2 : conversions en booléen ---
// PRÉDICTIONS (écris ta réponse true/false avant de tester) :
// 0     -> false
// 0.0   -> false
// "0"   -> true
// ""    -> true
// "abc" -> false
// []    -> true
// null  -> false

var_dump((bool) 0);
echo "<br>";
var_dump((bool) 0.0);
echo "<br>";
var_dump((bool) "0");
echo "<br>";
var_dump((bool) "");
echo "<br>";
var_dump((bool) "abc");
echo "<br>";
var_dump((bool) []);
echo "<br>";
var_dump((bool) null);
echo "<br>";

// --- Question 3 : conversions numériques ---
// PRÉDICTIONS (écris ta réponse avant de tester) :
// (int) 3.9        -> false
// (int) "12abc"    -> false
// (float) "1.5e3"  -> true
// (int) true       -> false

var_dump((int) 3.9);
echo "<br>";
var_dump((int) "12abc");
echo "<br>";
var_dump((float) "1.5e3");
echo "<br>";
var_dump((int) true);
echo "<br>";

// --- Question 4 : notations du nombre 255 ---
$dec = 255;      // décimal
$hex = 0xFF;     // hexadécimal
$oct = 0377;     // octal
$bin = 0b11111111; // binaire

echo "Décimal : $dec<br>";
echo "Hexadécimal : $hex<br>";
echo "Octal : $oct<br>";
echo "Binaire : $bin<br>";

// ===== Exercice 1.5 : Chaînes de caractères =====
echo "<h3>Exercice 1.5</h3>";

$traitees = "égales à";
$ici = 2;

// 1. Guillemets doubles dans la chaîne : on utilise des guillemets simples autour
echo '1. Ahmed a dit : "J\'ai réussi"<br>';

// 2. Le backslash doit être échappé avec un autre backslash
echo 'Voulez-vous supprimer C:\*.*?<br>';

// 3. Avec des guillemets simples, \n n'est pas interprété
echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';

// 4. Guillemets simples : les variables ne sont pas interprétées
echo '4. Les variables ne seront pas $traitees $ici<br>';

// 5. Guillemets doubles : les variables sont interprétées
echo "5. Les variables seront $traitees $ici<br>";

// --- trim() : retirer les * de la chaîne ---
$texte = "*Bonjour les développeurs*";
$propre = trim($texte, "*");
echo "Avant : $texte<br>";
echo "Après : $propre<br>";

// --- Une lettre par ligne avec strlen() et for ---
$mot = "PHP";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}