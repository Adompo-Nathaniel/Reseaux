<?php 
include_once "MyPDO.php";

class User{
    private string $username;
    private string $password;
    private int $id;

    public function __construct(string $username, string $password, int $id = -1){
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getId(): int{
        return $this->id;
    }
