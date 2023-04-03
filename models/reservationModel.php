<?php
class reservation extends database{
    public int $id = 0;
    public string $activityType = '';
    public int $caution = 0;
    public int $id_planes = 0;
    public int $id_user = 0;
    public string $loan = '';
    public string $loanReturn = '';
    public string $startLoan = '';
    public string $endLoan = '';
    public int $price = 0;

    public function __construct(){
        parent::connect();
    }

    public function checkLoan(){
        $query = 'SELECT loan, loanReturn, id_planes FROM abzr6_reservations 
        WHERE ((loan BETWEEN :startLoan AND :endLoan) 
        OR (loanReturn BETWEEN :startLoan AND :endLoan) 
        OR (:startLoan BETWEEN loan AND loanReturn) 
        OR (:endLoan BETWEEN loan AND loanReturn))
        AND id_planes = :id_planes';
        $request = $this->db->prepare($query);
        $request->bindValue(':startLoan', $this->startLoan, PDO::PARAM_STR);
        $request->bindValue(':endLoan', $this->endLoan, PDO::PARAM_STR);
        $request->bindValue(':id_planes', $this->id_planes, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertLoan(){
        $query = 'INSERT INTO `abzr6_reservations`(`loan`, `loanReturn`, `price`, `caution`, `activityType`, `id_users`, `id_planes`) 
        VALUES (:loan, :loanReturn, :price, :caution, :activityType, :id_users, :id_planes);';
        $request = $this->db->prepare($query);
        $request->bindValue(':loan', $this->loan, PDO::PARAM_STR);
        $request->bindValue(':loanReturn', $this->loanReturn, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_INT);
        $request->bindValue(':caution', $this->loan, PDO::PARAM_INT);
        $request->bindValue(':activityType', $this->activityType, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_user, PDO::PARAM_STR);
        $request->bindValue(':id_planes', $this->id_planes, PDO::PARAM_STR);  
        return $request->execute();    
    }


    public function seeLoan(){
        $query = 'SELECT abzr6_reservations.loan, abzr6_reservations.loanReturn, abzr6_planes.name, abzr6_planes.images, abzr6_users.firstName, abzr6_users.lastName , abzr6_reservations.id
        FROM abzr6_reservations
        LEFT JOIN abzr6_planes ON abzr6_reservations.id_planes = abzr6_planes.id
        LEFT JOIN abzr6_users ON abzr6_reservations.id_users = abzr6_users.id
        WHERE abzr6_users.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id_user, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }



    public function dropReservation(){
        $query = 'DELETE FROM abzr6_reservations WHERE abzr6_reservations.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id_planes, PDO::PARAM_INT);
        return $request->execute();
    }


    public function checkIdOfReservation(){
        $query = 'SELECT id FROM abzr6_reservations';
        $request = $this->db->query($query); 
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
    public function updateReservation(){
        $query = 'UPDATE abzr6_reservations SET loan = :loan, loanReturn = :loanReturn WHERE abzr6_reservations.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':loan', $this->loan, PDO::PARAM_STR);
        $request->bindValue(':loanReturn', $this->loanReturn, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id_planes, PDO::PARAM_INT);
        return $request->execute();
    }
}