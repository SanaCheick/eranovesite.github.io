<?php
include('includes/db.php');

$professor_id = $_POST['professor'];
$course_id = $_POST['course'];
$day = $_POST['day'];
$time = $_POST['time'];

$sql = "INSERT INTO Schedule (professor_id, course_id, day, time) VALUES ('$professor_id', '$course_id', '$day', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "Emploi du temps enregistré avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
