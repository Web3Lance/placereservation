<?php

namespace App\Model\Table;
use Cake\Validation\Validator;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setTable("users");
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator->notEmptyString('lastname');
        $validator->notEmptyString('firstname');
        $validator->notEmptyString('birthdate');
        $validator->notEmptyString('email');
        $validator->notEmptyString('phone');
        $validator->notEmptyString('reservation_id');
        return $validator;
    }
}