<?php 

session_start();
include('../includes/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification de l'authentification
    $result = $conn->query("SELECT * FROM Admins WHERE username='$username' AND password='$password'");
    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

include('../includes/header2.php'); ?>

<div class="container">
    <h2>Connexion Administrateur</h2>
    <form action="dashboard.php" method="POST">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Se connecter</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
