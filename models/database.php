<?php
class database{
    protected $db;
    protected string $prefix = 'abrzr6_';

    public function connect(){
        try{
            $this->db = new PDO('mysql:host=localhost;dbname=tp_project;charset=utf8mb4', 'valod', 'BB4BC107867EA0DD382F1CD61A66FCE1');
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}