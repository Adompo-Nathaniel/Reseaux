<!-- verifie en php si l'identifiant et le mdp sont corrects si oui demarre une session et redirige vers la page index.php sinon redirige vers la page login.php avec un message d'erreur -->
<?php
    // on verifie si les champs sont remplis
    if (isset($_POST['identifiant']) && isset($_POST['mdp'])) {
        // on verifie si les champs sont vides
        if (!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
            // on recupere les valeurs des champs
            $identifiant = $_POST['identifiant'];
            $mdp = $_POST['mdp'];
            
            include '../config/DBConfig.php';
            spl_autoload_register(function ($class) {
                include $class . '.php';
            });

            $db = MyPDO::getInstance();
            
            $stmt = $db->prepare("SELECT login,password FROM user WHERE login = :login AND password = :password");
            $stmt->execute(array(':login' => $identifiant, ':password' => $mdp));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                session_start();
                $_SESSION['identifiant'] = $identifiant;
                header('Location: DysplayTable.php');
            } else {
                header('Location: ../html/login.php?erreur=1');
            }
        } else {
            header('Location: ../html/login.php?erreur=1');
        }
    } else {
        header('Location: ../html/login.php?erreur=1');
    }