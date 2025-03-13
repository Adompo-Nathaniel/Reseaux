<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php 
        $db = MyPDO::getInstance();
        $forumModel = new ForumModel($db);
        $forum = $forumModel->readForum($_GET['id']);
        echo "Forum : " . $forum->getTitle()?></title>
</head>
<body>
    <div class="nav-placement">
        <a class="btn-return" href="DysplayTable.php">Retour</a>
        <h1>Bienvenue <?php echo $_SESSION['identifiant']; ?></h1>
        <a class="btn-logout" href="logout.php">Deconnexion</a>
    </div>
    <div class="forum-content">
        <h1><?php echo $forum->getTitle(); ?></h1>
        <div class="forum-message">
            <?php
            $messageModel = new MessageModel($db);
            $stmt = $db->prepare("SELECT * FROM Message WHERE forum_id = :forum_id");
            $stmt->bindValue(":forum_id", $_GET['id']);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $user = $messageModel->readUser($row['user_id']);
                echo "<div id='message'>";
                echo "<p1 >Par " . $user->getUsername() . "</p1><br>";
                echo "<p2 >" . $row['text'] . "</p2><br>";
                /*date format XX/XX/XXXX, l'heure est affichée en plus sous le format XX/XX/XX*/
                echo "<p3 >" . date("d/m/Y", strtotime($row['date'])) . " à " . date("H:i", strtotime($row['date'])) . "</p3>";
                echo "</div>";
            }
            ?>
        </div>
        <form class="forum-form" action="DysplayForum.php?id=<?php echo $_GET['id']; ?>" method="post">
            <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
            <input class="btn" type="submit" value="Envoyer">
        </form>
    
</body>
</html>

