<?php
include "Forum.php";

class Forum_Model {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->categoryIds = $this->getCategoryIds();
    }

    private function getCategoryIds(): array {
        $tmp = $this->pdo->query('
            SELECT id 
            FROM Category
        ');
            return $tmp->fetchAll(PDO::FETCH_COLUMN);
    }

    public function create(Forum $forum): void {
        if (!in_array($forum->getCategoryId(), $this->categoryIds)) {
            throw new Exception('ID de category invalid');
        }
        $tmp = $this->pdo->prepare("
            INSERT INTO Forum (titre, id_category) 
            VALUES (:titre, :id_category)
        ");
            $tmp->bindValue(":titre", $forum->getTitle());
            $tmp->bindValue(":id_category", $forum->getCategoryId());
            $tmp->execute();
    }

    public function read(int $id): Forum {
        $tmp = $this->pdo->prepare("
            SELECT * FROM Forum 
            WHERE id = :id
        ");
            $tmp->bindValue(":id", $id);
            $tmp->execute();
            $row = $tmp->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new Exception('ID de forum invalid');
        }
        return new Forum($row['titre'], $row['id_category'], $row['id']);
    }

    public function update(Forum $forum): void {
        if (!in_array($forum->getCategoryId(), $this->categoryIds)) {
            throw new Exception('ID de category invalid');
        }
        
        $stmt = $this->pdo->prepare("
            UPDATE Forum 
            SET title = :title, id_category = :id_category 
            WHERE id = :id
        ");
        $tmp->bindValue(":titre", $forum->getTitre());
        $tmp->bindValue(":id_category", $forum->getCategoryId());
        $tmp->bindValue(":id", $forum->getId());
        $tmp->execute();
    }

    public function delete(int $id): void {
        $tmp = $this->pdo->prepare("
            DELETE FROM Forum 
            WHERE id = :id
            ");
        $tmp->bindValue(":id", $id);
        $tmp->execute();
    }
}


// $pdo = MyPDO::getInstance();
// $forumModel = new ForumModel($pdo);
// $forumModel->createForum(new Forum('Action', 1, 1));
// $forum = $forumModel->readForum(1);
// echo <<<HTML
//     <p>Forum title: {$forum->getTitle()}</p>
//     <p>Forum category ID: {$forum->getCategoryId()}</p>
//     <p>Forum ID: {$forum->getId()}</p>
// HTML;