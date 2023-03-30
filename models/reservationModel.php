<?php
class reservation extends database{
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
        OR (:endLoan BETWEEN loan AND loanReturn))';
        $request = $this->db->prepare($query);
        $request->bindValue(':startLoan', $this->startLoan, PDO::PARAM_STR);
        $request->bindValue(':endLoan', $this->endLoan, PDO::PARAM_STR);
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

}