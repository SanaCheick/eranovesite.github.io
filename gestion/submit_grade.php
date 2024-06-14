<?php
include('includes/db.php');

$student_id = $_POST['student'];
$course_id = $_POST['course'];
$grade = $_POST['grade'];

$sql = "INSERT INTO Grades (student_id, course_id, grade) VALUES ('$student_id', '$course_id', '$grade')";

if ($conn->query($sql) === TRUE) {
    echo "Note enregistrée avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
