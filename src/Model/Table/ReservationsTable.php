<?php

namespace App\Model\Table;
use Cake\Validation\Validator;

use Cake\ORM\Table;

class ReservationsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setTable("reservations");
        $this->hasMany('Users');
    }
   
}