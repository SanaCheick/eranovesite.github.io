<?php
// Page pour planifier un examen
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'administrateur') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../includes/db.php');
    
    $id_module = $_POST['id_module'];
    $date = $_POST['date'];
    $salle = $_POST['salle'];
    
    $query = "INSERT INTO Examens (id_module, date, salle) VALUES ('$id_module', '$date', '$salle')";
    if (mysqli_query($conn, $query)) {
        echo '<p>Examen planifié avec succès.</p>';
    } else {
        echo '<p>Erreur lors de la planification de l\'examen.</p>';
    }
}

// Récupérer les modules pour les options du formulaire
include('../includes/db.php');
$modules = mysqli_query($conn, "SELECT * FROM Modules");

?>

<form method="POST" action="add_exam.php">
    <label for="id_module">Module:</label>
    <select id="id_module" name="id_module" required>
        <?php while ($module = mysqli_fetch_assoc($modules)) { ?>
            <option value="<?php echo $module['id_module']; ?>"><?php echo $module['nom']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>
    <br>
    <label for="salle">Salle:</label>
    <input type="text" id="salle" name="salle" required>
    <br>
    <button type="submit">Planifier l'examen</button>
</form>

<?php
include('../includes/footer.php');
?>
