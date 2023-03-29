<?php
class planes extends database
{
    public string $name = '';
    public string $status = '';
    public string $description = '';
    public int $price = 0;



    public function __construct()
    {
        parent::connect();
    }


    public function checkIfAvailable()
    {
        $query = 'SELECT abzr6_planes.status FROM abzr6_reservations
        RIGHT JOIN abzr6_planes ON abzr6_planes.id = abzr6_reservations.id_planes
        WHERE abzr6_planes.status = ":name"';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
}
