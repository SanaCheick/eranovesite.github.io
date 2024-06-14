<?php include('../includes/header.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Voir les Notes des Étudiants</h2>
    <ul>
        <?php
        $professor_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT Students.name AS student_name, Courses.name AS course_name, Grades.grade FROM Grades INNER JOIN Students ON Grades.student_id = Students.id INNER JOIN Courses ON Grades.course_id = Courses.id INNER JOIN Schedule ON Schedule.course_id = Courses.id WHERE Schedule.professor_id = $professor_id");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['student_name'] . " - " . $row['course_name'] . ": " . $row['grade'] . "</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
