<?php include('../includes/header2.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Gérer les Notes</h2>
    <form action="../submit_grade.php" method="POST">
        <label for="student">Étudiant:</label>
        <select id="student" name="student" required>
            <?php
            $students = $conn->query("SELECT * FROM Students");
            while ($student = $students->fetch_assoc()) {
                echo "<option value='" . $student['id'] . "'>" . $student['name'] . "</option>";
            }
            ?>
        </select>
        
        <label for="course">Cours:</label>
        <select id="course" name="course" required>
            <?php
            $courses = $conn->query("SELECT * FROM Courses");
            while ($course = $courses->fetch_assoc()) {
                echo "<option value='" . $course['id'] . "'>" . $course['name'] . "</option>";
            }
            ?>
        </select>
        
        <label for="grade">Note:</label>
        <input type="text" id="grade" name="grade" required>
        
        <button type="submit">Enregistrer Note</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
