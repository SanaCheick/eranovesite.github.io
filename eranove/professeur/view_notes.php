<?php
// Page pour consulter les notes des étudiants
include('../includes/header.php');
session_start();

if ($_SESSION['role'] != 'professeur') {
    header('Location: ../login.php');
    exit();
}

include('../includes/db.php');

$query = "SELECT Etudiants.matricule, Modules.nom AS module, Notes.note, Notes.date_enregistrement
          FROM Notes
          JOIN Etudiants ON Notes.id_etudiant = Etudiants.id_etudiant
          JOIN Modules ON Notes.id_module = Modules.id_module";
$result = mysqli_query($conn, $query);
?>

<h2>Notes des Étudiants</h2>

<table>
    <thead>
        <tr>
            <th>Matricule Étudiant</th>
            <th>Module</th>
            <th>Note</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['matricule']; ?></td>
                <td><?php echo $row['module']; ?></td>
                <td><?php echo $row['note']; ?></td>
                <td><?php echo $row['date_enregistrement']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
