<?php

namespace App\Controller;

use App\Controller\AppController;

class AjaxController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
       
        $this->loadModel("Users");
    }

    public function ajaxAddUser(){

        if ($this->request->is('ajax')) {
            
            $student = $this->Users->newEmptyEntity();

            $student = $this->Users->patchEntity($student, $this->request->getData());
            if ($this->Users->save($student)) {

                $this->Flash->success(__('User has been created'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "User has been created"
                )); 

                exit;
            }

            $this->Flash->error(__('Failed to save student data'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            )); 

            exit;
        }
    }

}