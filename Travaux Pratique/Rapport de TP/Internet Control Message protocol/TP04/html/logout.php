<!-- si la sesseion est demarree on redirige vers la page login.php et on deconnecte l'utilisateur -->

<?php
    // on demarre une session
    session_start();
    // on verifie si la session est demarree
    if (!empty($_SESSION['identifiant'])) {
        // on redirige vers la page login.php
        header('Location: login.php');
    }
    // on detruit la session
    session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
</body>
</html>