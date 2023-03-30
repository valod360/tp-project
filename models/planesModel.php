<?php
class planes extends database
{
    public int $id = 0;
    public string $name = '';
    public string $status = '';
    public string $description = '';
    public int $price = 0;
    public string $activityType = '';



    public function __construct()
    {
        parent::connect();
    }


    public function checkIfAvailable()
    {
        $query = 'SELECT abzr6_planes.status, abzr6_planes.id FROM abzr6_reservations
        RIGHT JOIN abzr6_planes ON abzr6_planes.id = abzr6_reservations.id_planes
        WHERE abzr6_planes.name = :name';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
        
    }

    public function checkPlanes(){
        $query = 'SELECT name, id, status FROM abzr6_planes';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updatePlanesStatus(){
        $query = 'UPDATE abzr6_planes SET status="indisponible"
        WHERE abzr6_planes.name = :name';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $request->execute();
    }

    public function updatePlaneStatusAvailable(){
        $query = 'UPDATE abzr6_planes SET status="disponible"
        WHERE abzr6_planes.name = :name';
        $request = $this->db->prepare($query);
        $request->bindValue(':name', $this->name, PDO::PARAM_STR);
        return $request->execute();
    }

}



/*SELECT abzr6_planes.id AS planeId, if(loanReturn IS NOT NULL,IF(NOW() > loanReturn, 'disponible', 'indispo'), 'disponible')
FROM `abzr6_planes`
LEFT JOIN abzr6_reservations ON id_planes = abzr6_planes.id;*/