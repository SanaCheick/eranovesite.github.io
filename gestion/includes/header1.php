<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/scripts.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <?php if ($_SESSION['role'] == 'admin'): ?>
                    <li><a href="dashboard.php">Tableau de Bord</a></li>
                <?php elseif ($_SESSION['role'] == 'student'): ?>
                    <li><a href="../student/dashboard.php">Tableau de Bord</a></li>
                <?php elseif ($_SESSION['role'] == 'professor'): ?>
                    <li><a href="../professor/dashboard.php">Tableau de Bord</a></li>
                <?php endif; ?>
                <li><a href="../logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
