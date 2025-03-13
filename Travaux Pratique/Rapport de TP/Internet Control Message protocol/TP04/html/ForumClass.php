<!-- Écrivez une classe Forum (on ne considère pas les messages). -->
<!-- les messages sont dans la classe ForumMessage -->
<!-- La classe Forum contient les attributs suivants : -->
<!-- - titre : titre du forum (chaîne de caractères) -->
<!-- le mdp de la base de donnees est :
Table "Category"
- id: int (primary key)
- name: varchar

Table "Forum"
- id: int (primary key)
- title: varchar
- category_id: int (foreign key to Category.id)

Table "User"
- id: int (primary key)
- username: varchar
- password: varchar

Table "Message"
- id: int (primary key)
- text: text
- date: datetime
- user_id: int (foreign key to User.id)
- forum_id: int (foreign key to Forum.id) -->


<?php
include_once "MyPDO.php";
class Forum {
    private string $title;
    private int $category_id;

    public function __construct(string $title, int $category_id) {
        $this->title = $title;
        $this->category_id = $category_id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getCategoryId(): int {
        return $this->category_id;
    }
}

