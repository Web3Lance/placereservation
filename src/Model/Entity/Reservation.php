<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Reservation extends Entity
{ 
    protected $_accessible = [
        "id" => true,
        "start_date" => true,
        "end_date" => true
    ];
}