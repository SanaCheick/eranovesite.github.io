<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Voir l'Emploi du Temps</h2>
    <ul>
        <?php
        $professor_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT Courses.name, Schedule.day, Schedule.time FROM Schedule INNER JOIN Courses ON Schedule.course_id = Courses.id WHERE Schedule.professor_id = $professor_id");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . ": " . $row['day'] . " à " . $row['time'] . "</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
