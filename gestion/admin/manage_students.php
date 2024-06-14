<?php include('../includes/header2.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Gérer les Étudiants</h2>
    <form action="add_student.php" method="POST">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <button type="submit">Ajouter Étudiant</button>
    </form>
    
    <h3>Liste des Étudiants</h3>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM Students");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . " (" . $row['email'] . ")</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
