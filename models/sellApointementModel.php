<?php
class vente extends database{

    public int $id = 0;
    public string $date = '';
    public int $id_users = '';



    public function __construct(){
        parent::connect();
    }


}