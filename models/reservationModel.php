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



}