
<?php 
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    header('Location: login.php');
    exit;
}
include('../includes/header2.php'); ?>

<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Voir les Notes</h2>
    <ul>
        <?php
        $student_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT Courses.name, Grades.grade FROM Grades INNER JOIN Courses ON Grades.course_id = Courses.id WHERE Grades.student_id = $student_id");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . ": " . $row['grade'] . "</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
