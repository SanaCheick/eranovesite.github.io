<?php
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    
    he
header('Location: login.php');
    exit;
}
include('../includes/header2.php'); ?>

<div class="container">
    <h2>Tableau de Bord Étudiant</h2>
    <ul>
        <li><a href="view_grades.php">Voir les Notes</a></li>
        <li><a href="view_schedule.php">Voir l'Emploi du Temps</a></li>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
