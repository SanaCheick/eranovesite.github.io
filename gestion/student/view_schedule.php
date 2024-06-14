<?php include('../includes/header2.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Voir l'Emploi du Temps</h2>
    <ul>
        <?php
        $student_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT Courses.name, Schedule.day, Schedule.time FROM Schedule INNER JOIN Courses ON Schedule.course_id = Courses.id INNER JOIN Students ON Students.id = $student_id WHERE Courses.id IN (SELECT course_id FROM Grades WHERE student_id = $student_id)");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . ": " . $row['day'] . " à " . $row['time'] . "</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
