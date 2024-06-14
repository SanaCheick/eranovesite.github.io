<?php
// Page pour consulter les notes de l'étudiant
include('../includes/header2.php');
session_start();

if ($_SESSION['role'] != 'etudiant') {
    header('Location: ../login.php');
    exit();
}

include('../includes/db.php');

$id_etudiant = $_SESSION['id_utilisateur'];

$query = "SELECT Modules.nom, Notes.note, Notes.date_enregistrement FROM Notes
          JOIN Modules ON Notes.id_module = Modules.id_module
          WHERE Notes.id_etudiant = '$id_etudiant'";
$result = mysqli_query($conn, $query);
?>

<h2>Mes Notes</h2>

<table>
    <thead>
        <tr>
            <th>Module</th>
            <th>Note</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['note']; ?></td>
                <td><?php echo $row['date_enregistrement']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
