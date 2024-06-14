<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    
header('Location: login.php');
    exit;
}
include('../includes/header2.php'); ?>

<div class="container">
    <h2>Tableau de Bord Administrateur</h2>
    <ul>
        <li><a href="manage_students.php">Gérer les étudiants</a></li>
        <li><a href="manage_professors.php">Gérer les professeurs</a></li>
        <li><a href="manage_courses.php">Gérer les cours</a></li>
        <li><a href="manage_grades.php">Gérer les notes</a></li>
        <li><a href="manage_schedule.php">Gérer les emplois du temps</a></li>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
