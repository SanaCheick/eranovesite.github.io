<?php
// Page de login
include('includes/header.php');
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connexion à la base de données
    include('includes/db.php');
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Vérification des informations de l'utilisateur
    $query = "SELECT * FROM Utilisateurs WHERE email = '$email' AND mot_de_passe = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
        $_SESSION['role'] = $user['role'];
        
        // Redirection vers le tableau de bord
        header('Location: dashboard.php');
        exit();
    } else {
        echo '<p>Erreur de connexion. Veuillez réessayer.</p>';
    }
}
?>

<form method="POST" action="login.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Se connecter</button>
</form>

<?php
include('includes/footer.php');
?>
