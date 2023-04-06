<?php
class users extends database
{
    public int $id = 0;
    public string $city = '';
    public string $email = '';
    public string $firstName = '';
    public string $lastName = '';
    public int $major = 0;
    public string $password = '';
    public string $phoneNumber = '';
    public string $postalCode = '';


    public function __construct()
    {
        parent::connect();
    }

    public function addUser()
    {
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

    public function checkIfUserExists($column)
    {
        $query = 'SELECT count(' . $column . ')
        FROM `' . $this->prefix . 'users` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->{$column}, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getPass()
    {
        $query = 'SELECT password FROM `abzr6_users`
        WHERE abzr6_users.email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    public function getId()
    {
        $query = 'SELECT id FROM abzr6_users
        WHERE email = :email';
        $request = $this->db->prepare($query);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    public function checkUserInformation()
    {
        $query = 'SELECT firstName, lastName, major, city, email, phoneNumber FROM abzr6_users
        WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateUserInformation()
    {
        $query = 'UPDATE abzr6_users 
        SET firstName = :firstName, lastName = :lastName, major = :major, city = :city, email = :email, phoneNumber = :phoneNumber
        WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $request->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $request->bindValue(':major', $this->major, PDO::PARAM_INT);
        $request->bindValue(':city', $this->city, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }


    public function deleteUserReservation(){
        $query = 'DELETE FROM abzr6_reservations WHERE id_users = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();

    }

    public function deleteUser()
    {
        try {
            $query = 'DELETE FROM abzr6_users WHERE id = :id';
            $request = $this->db->prepare($query);
            $request->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $request->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
            // ou vous pouvez enregistrer le message d'erreur dans un fichier de journalisation pour une analyse ultérieure
            return false;
        }
    }
}
