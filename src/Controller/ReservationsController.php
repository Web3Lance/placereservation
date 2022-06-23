<?php

namespace App\Controller;

use App\Controller\AppController;

class ReservationsController extends AppController
{
   
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Paginator');
        $this->loadModel("Reservations");
        $this->loadModel("Users");
    }
    
    public function listReservations()
    {
       $reservations = $this->Paginator->paginate($this->Reservations->find());
       $users = $this->Reservations->find();
        $this->set("title", "List Reservations");
        $this->set(compact("reservations"));
       
    }
    public function detailReservation($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => [],
        ]);
        $users = $this->Users->find('all', array(
            'conditions' => array('reservation_id' =>$id)));

        if ($this->request->is(['post'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
        }
        $this->set(compact("users"));
        $this->set("title", "Detail reservation");
        
    }

    
    
}