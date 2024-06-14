<?php 
session_start();
if (!isset($_SESSION['professor_logged_in'])) {
    header('Location: login.php');
    exit;
}

include('../includes/header.php'); ?>

<div class="container">
    <h2>Tableau de Bord Professeur</h2>
    <ul>
        <li><a href="view_grades.php">Voir les Notes</a></li>
        <li><a href="view_schedule.php">Voir l'Emploi du Temps</a></li>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
