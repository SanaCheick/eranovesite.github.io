<?php 
session_start();
include('../includes/header2.php'); ?>

<div class="container">
    <h2>Connexion Étudiant</h2>
    <form action="dashboard.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Se connecter</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
