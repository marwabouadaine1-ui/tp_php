<?php
// Auteur : marwa
// Objectif : Pied de page (date du jour et jours restants avant la fin du semestre)
// Date : 19/10/2026

// 1. Date du jour au format jj/mm/aaaa
$aujourdhui = date("d/m/Y");

// 2. Nombre de jours restants avant la fin du semestre (date au choix)
$maintenant = new DateTime("today");
$fin = new DateTime("2027-01-31");   // change cette date si tu veux
$diff = $maintenant->diff($fin);
$jours = $diff->invert ? 0 : $diff->days;
?>
<hr>
<footer>
    <p>TP PHP - Date du jour : <?php echo $aujourdhui; ?></p>
    <p>Jours restants avant la fin du semestre : <?php echo $jours; ?></p>
</footer>
</body>
</html>