<?php

include_once "MyPDO.php";

class Message {
    private string $text;
    private DateTime $date;
    private int $user_id;
    private int $forum_id;
    private int $id;

    public function __construct(string $text, DateTime $date, int $user_id, int $forum_id) {
        $this->text = $text;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->forum_id = $forum_id;
    }
    public function getText(): string {
        return $this->text;
    }
    public function getDate(): DateTime {
        return $this->date;
    }
    public function getUserId(): int {
        return $this->user_id;
    }
    public function getForumId(): int {
        return $this->forum_id;
    }
}