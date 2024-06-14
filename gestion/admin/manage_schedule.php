<?php include('../includes/header2.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Gérer les Emplois du Temps</h2>
    <form action="../submit_schedule.php" method="POST">
        <label for="professor">Professeur:</label>
        <select id="professor" name="professor" required>
            <?php
            $professors = $conn->query("SELECT * FROM Professors");
            while ($professor = $professors->fetch_assoc()) {
                echo "<option value='" . $professor['id'] . "'>" . $professor['name'] . "</option>";
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
        
        <label for="day">Jour:</label>
        <input type="text" id="day" name="day" required>
        
        <label for="time">Heure:</label>
        <input type="text" id="time" name="time" required>
        
        <button type="submit">Enregistrer Emploi du Temps</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
