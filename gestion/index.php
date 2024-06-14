<?php 
session_start();
include('includes/header.php'); ?>

<div class="container">
    <h2>Bienvenue sur le Système de Gestion</h2>
    <p>Veuillez vous connecter pour accéder à votre tableau de bord.</p>
    <ul>
        <li><a href="admin/login.php">Connexion Administrateur</a></li>
        <li><a href="student/login.php">Connexion Étudiant</a></li>
        <li><a href="professor/login.php">Connexion Professeur</a></li>
    </ul>
</div>

<?php include('./includes/footer.php'); ?>
