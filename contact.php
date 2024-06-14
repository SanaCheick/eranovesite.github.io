<?php
include('contactdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $entreprise = $_POST['entreprise'];
    $telephone = $_POST['telephone'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];

    $query = "INSERT INTO Contacts (nom, email, entreprise, telephone, objet, message) 
              VALUES ('$nom', '$email', '$entreprise', '$telephone', '$objet', '$message')";
    
    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Message envoyé avec succès !"); window.location.href = "index.php";</script>';
    } else {
        echo "Erreur: " . $query . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
