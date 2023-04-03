<?php
class users extends database{
    public int $id = 0;
    public string $city = '';
    public string $email = '';
    public string $firstName = '';
    public string $lastName = '';
    public int $major = 0;
    public string $password = '';
    public string $phoneNumber = '';
    public string $postalCode = '';


    public function __construct(){
        parent::connect();
    }

    public function addUser(){
        $query = "INSERT INTO `" . $this->prefix . "users`(`firstName`, `lastName`, `city`, `email`, `major`, `phoneNumber`, `password`) 
        VALUES (:firstName, :lastName, :city, :email, :major, :phoneNumber, :password)";
        $request = $this->db->prepare($query);
        $request->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $request->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $request->bindValue(':city', $this->city, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':major', $this->major, PDO::PARAM_INT);
        $request->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $request->execute();
    }

    public function checkIfUserExists($column){
        $query = 'SELECT count(' . $column . ')
        FROM `' . $this->prefix . 'users` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->{$column}, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getPass(){
        $query = 'SELECT password FROM `abzr6_users`
        WHERE abzr6_users.email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getId(){
        $query = 'SELECT id FROM abzr6_users
        WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteUser(){
        $query = 'DELETE FROM abzr6_users WHERE id = :id';   
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}