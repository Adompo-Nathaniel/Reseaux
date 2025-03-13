<!-- Page de login pour un site internet -->
<!-- form avec identifiant et mdp et un btn de connexion qui renvoie vers verif.php-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- link css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        // on verifie si il y a un message d'erreur
        if (isset($_GET['erreur'])) {
            // on affiche le message d'erreur
            echo '<p class="error_message" >Identifiant ou mot de passe incorrect</p>';
        }
    ?>

    <form class="login-form" action="verif.php" method="post">
        <label for="identifiant">Identifiant</label>
        <br>
        <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant">
        <br>
        <label for="mdp">Mot de passe</label>
        <br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
        <br>
        <input class="btn" type="submit" value="Connexion">
    </form>
</body>
</html>
