<?php
//on supose que la table user existe deja dans la base de donnees contenant les champs suivants :id , login, password
//utiliser la classe MyPDO pour se afficher un utilisateur de la table user puis toute la table

include '../config/DBConfig.php';
include "MessageModel.php";
include "ForumModel.php";

spl_autoload_register(function ($class) {
    include $class . '.php';
});
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="metheobck">
    <div class="nav-placement">
        <?php echo "<h1>Bienvenue " . $_SESSION['identifiant'] . "</h1>"; ?>
        <a class="btn-logout" href="logout.php">Deconnexion</a>
    </div>
    <br><br>
        <h1 style="text-align: center; margin-top: 30px;">Liste des forums</h1>
        <a class="btn" href="CreateForum.php">Créer un forum</a>
    <div class="dysplay-card">
    <?php
    try {
    $db = MyPDO::getInstance();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    $forumModel = new ForumModel($db);
    $messageModel = new MessageModel($db);
    //affichage des forums
    $stmt = $db->prepare("SELECT * FROM Forum");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        //echo les forums et redirection vers la page DysplayForum.php
        echo "<div id='forum-card'>";
        echo "<a href='DysplayForum.php?id=" . $row['id'] . "' style='
        color: black;
        text-decoration: none; 
        '>" . $row['title'] . "</a>";
        echo "</div>";
    }
?>
    </div>
</body>
</html>