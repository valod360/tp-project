<?php
class reservation extends database{
    public string $activityType = '';
    public int $caution = 0;
    public int $id_planes = 0;
    public int $id_user = 0;
    public string $loan = '';
    public string $loanReturn = '';
    public int $price = 0;

    public function __construct(){
        parent::connect();
    }


    public function checkIfAvailable(){
        $query = 'SELECT abzr6_planes.status FROM abzr6_reservations
        RIGHT JOIN abzr6_planes ON abzr6_planes.id = abzr6_reservations.id_planes';
        $request = $this->db->query($query);
        return $request->fetchALL(PDO::FETCH_OBJ);
    }



}