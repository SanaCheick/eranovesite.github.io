<?php
// Page pour consulter le calendrier des cours du professeur
include('../includes/header.php');
session_start();

if ($_SESSION['role'] != 'professeur') {
    header('Location: ../login.php');
    exit();
}

include('../includes/db.php');

$id_professeur = $_SESSION['id_utilisateur'];

$query = "SELECT Modules.nom, Cours.salle, Cours.horaire FROM Cours
          JOIN Modules ON Cours.id_module = Modules.id_module
          WHERE Cours.id_professeur = '$id_professeur'";
$result = mysqli_query($conn, $query);
?>

<h2>Mon Calendrier des Cours</h2>

<table>
    <thead>
        <tr>
            <th>Module</th>
            <th>Salle</th>
            <th>Horaire</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['salle']; ?></td>
                <td><?php echo $row['horaire']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include('../includes/footer.php');
?>
