<?php
// Page pour saisir une note
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'administrateur') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../includes/db.php');
    
    $id_etudiant = $_POST['id_etudiant'];
    $id_module = $_POST['id_module'];
    $note = $_POST['note'];
    
    $query = "INSERT INTO Notes (id_etudiant, id_module, note) VALUES ('$id_etudiant', '$id_module', '$note')";
    if (mysqli_query($conn, $query)) {
        echo '<p>Note ajoutée avec succès.</p>';
    } else {
        echo '<p>Erreur lors de l\'ajout de la note.</p>';
    }
}

// Récupérer les étudiants et les modules pour les options du formulaire
include('../includes/db.php');
$etudiants = mysqli_query($conn, "SELECT * FROM Etudiants");
$modules = mysqli_query($conn, "SELECT * FROM Modules");

?>

<form method="POST" action="add_note.php">
    <label for="id_etudiant">Étudiant:</label>
    <select id="id_etudiant" name="id_etudiant" required>
        <?php while ($etudiant = mysqli_fetch_assoc($etudiants)) { ?>
            <option value="<?php echo $etudiant['id_etudiant']; ?>"><?php echo $etudiant['matricule']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="id_module">Module:</label>
    <select id="id_module" name="id_module" required>
        <?php while ($module = mysqli_fetch_assoc($modules)) { ?>
            <option value="<?php echo $module['id_module']; ?>"><?php echo $module['nom']; ?></option>
        <?php } ?>
    </select>
    <br>
    <label for="note">Note:</label>
    <input type="number" step="0.01" id="note" name="note" required>
    <br>
    <button type="submit">Ajouter la note</button>
</form>

<?php
include('../includes/footer.php');
?>
