<?php
// Page pour ajouter un module
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'administrateur') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../includes/db.php');
    
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $credit = $_POST['credit'];
    
    $query = "INSERT INTO Modules (nom, description, credit) VALUES ('$nom', '$description', '$credit')";
    if (mysqli_query($conn, $query)) {
        echo '<p>Module ajouté avec succès.</p>';
    } else {
        echo '<p>Erreur lors de l\'ajout du module.</p>';
    }
}
?>

<form method="POST" action="add_module.php">
    <label for="nom">Nom du module:</label>
    <input type="text" id="nom" name="nom" required>
    <br>
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    <br>
    <label for="credit">Crédits:</label>
    <input type="number" id="credit" name="credit" required>
    <br>
    <button type="submit">Ajouter le module</button>
</form>

<?php
include('../includes/footer.php');
?>
