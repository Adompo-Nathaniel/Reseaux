<?php 
include_once "MyPDO.php";

class User{
    
    private string $login;
    private string $password;
    private int $id;

    public function __construct(string $login, string $password, int $id = -1){
        $this->login = $login;
        $this->password = $password;
        $this->id = $id;
    }

    public function getLogin(): string{
        return $this->login;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getId(): int{
        return $this->id;
    }
}