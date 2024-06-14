<?php
// Page de tableau de bord
include('includes/header.php');
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    // Redirection vers la page de login si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Affichage du tableau de bord en fonction du rôle de l'utilisateur
if ($_SESSION['role'] == 'administrateur') {
    echo '<h2>Tableau de bord Administrateur</h2>';
    echo '<p><a href="admin/add_module.php">Ajouter un module</a></p>';
    echo '<p><a href="admin/add_course.php">Planifier un cours</a></p>';
    echo '<p><a href="admin/add_exam.php">Planifier un examen</a></p>';
    echo '<p><a href="admin/add_note.php">Saisir une note</a></p>';
} elseif ($_SESSION['role'] == 'professeur') {
    echo '<h2>Tableau de bord Professeur</h2>';
    echo '<p><a href="view_courses.php">Consulter le calendrier des cours</a></p>';
    echo '<p><a href="view_notes.php">Consulter les notes des étudiants</a></p>';
} elseif ($_SESSION['role'] == 'etudiant') {
    echo '<h2>Tableau de bord Étudiant</h2>';
    echo '<p><a href="etudiant/view_notes.php">Consulter mes notes</a></p>';
    echo '<p><a href="etudiant/view_modules.php">Suivre la validation des modules</a></p>';
}

include('includes/footer.php');
?>
