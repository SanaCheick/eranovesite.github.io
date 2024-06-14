<?php include('../includes/header2.php'); ?>
<?php include('../includes/db.php'); ?>

<div class="container">
    <h2>Gérer les Cours</h2>
    <form action="add_course.php" method="POST">
        <label for="name">Nom du Cours:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        
        <button type="submit">Ajouter Cours</button>
    </form>
    
    <h3>Liste des Cours</h3>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM Courses");
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . " - " . $row['description'] . "</li>";
        }
        ?>
    </ul>
</div>

<?php include('../includes/footer.php'); ?>
