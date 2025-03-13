<?php
include_once "MessageClass.php";
include_once "UserClass.php";

class MessageModel{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function createMessage(Message $message): void{
        $stmt = $this->pdo->prepare("INSERT INTO Message (text, date, user_id, forum_id) VALUES (:text, :date, :user_id, :forum_id)");
        $stmt->bindValue(":text", $message->getText());
        $stmt->bindValue(":date", $message->getDate()->format('Y-m-d H:i:s'));
        $stmt->bindValue(":user_id", $message->getUserId());
        $stmt->bindValue(":forum_id", $message->getForumId());
        $stmt->execute();
    }

    public function readMessage(int $id): Message{
        $stmt = $this->pdo->prepare("SELECT * FROM Message WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new Exception('Invalid message ID');
        }
        return new Message($row['text'], new DateTime($row['date']), $row['user_id'], $row['forum_id'], $row['id']);
    }

    public function updateMessage(Message $message): void{
        $stmt = $this->pdo->prepare("UPDATE Message SET text = :text WHERE id = :id");
        $stmt->bindValue(":text", $message->getText());
        $stmt->execute();
    }

    public function deleteMessage(int $id): void{
        $stmt = $this->pdo->prepare("DELETE FROM Message WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function readUser(int $id): User{
        $stmt = $this->pdo->prepare("SELECT * FROM User WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            throw new Exception('Invalid user ID');
        }
        return new User($row['login'], $row['password'], $row['id']);
    }
}