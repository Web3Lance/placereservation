<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        "lastname" => true,
        "firstname" => true,
        "email" => true,
        "phone" => true,
        "reservation_id" => true
    ];
}