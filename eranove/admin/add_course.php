<?php
// Page pour planifier un cours
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'administrateur') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../includes/db.php');
    
    $id_module = $_POST['id_module'];
    $id_professeur = $_POST['id_professeur'];
    $salle = $_POST['salle'];
    $horaire = $_POST['horaire'];
    
    $query = "INSERT INTO Cours (id_module, id_professeur, salle, horaire) VALUES ('$id_module', '$id_professeur', '$salle', '$horaire')";
    if (mysqli_query($conn, $query)) {
        echo '<p>Cours planifié avec succès.</p>';
    } else {
        echo '<p>Erreur lors de la planification du cours.</p>';
    }
}

// Récupérer les modules et les professeurs pour les options du formulaire
include('../includes/db.php');
$modules = mysqli_query($conn, "SELECT * FROM Modules");
$professeurs = mysqli_query($conn, "SELECT * FROM Professeurs");

?>

<form method="POST" action="add_course.php">
    <label for="id_module">Module:</label>
    <select id="id_module" name="id_module" required>
        <?php while ($module = mysqli_fetch_assoc($modules)) { ?>
            <option value="<?php echo $module['id_module']; ?>"><?php echo $module['nom']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="id_professeur">Professeur:</label>
    <select id="id_professeur" name="id_professeur" required>
        <?php while ($professeur = mysqli_fetch_assoc($professeurs)) { ?>
            <option value="<?php echo $professeur['id_professeur']; ?>"><?php echo $professeur['departement']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="salle">Salle:</label>
    <input type="text" id="salle" name="salle" required>
    <br>
    <label for="horaire">Horaire:</label>
    <input type="datetime-local" id="horaire" name="horaire" required>
    <br>
    <button type="submit">Planifier le cours</button>
</form>

<?php
include('../includes/footer.php');
?>
