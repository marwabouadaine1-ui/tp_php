<?php
// Auteur : marwa
// Objectif : Déconnexion (destruction de la session)
// Date : 19/10/2026

session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;