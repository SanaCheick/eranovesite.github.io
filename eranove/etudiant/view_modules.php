<?php
// Page pour consulter la validation des modules de l'étudiant
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'etudiant') {
    header('Location: ../login.php');
    exit();
}

include('../includes/db.php');

$id_etudiant = $_SESSION['id_utilisateur'];

$query = "SELECT Modules.nom, SUM(Notes.note) AS total_notes, COUNT(Notes.id_note) AS nb_notes FROM Notes
          JOIN Modules ON Notes.id_module = Modules.id_module
          WHERE Notes.id_etudiant = '$id_etudiant'
          GROUP BY Modules.id_module";
$result = mysqli_query($conn, $query);
?>

<h2>Validation des Modules</h2>

<table>
    <thead>
        <tr>
            <th>Module</th>
            <th>Total des Notes</th>
            <th>Nombre de Notes</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['total_notes']; ?></td>
                <td><?php echo $row['nb_notes']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
