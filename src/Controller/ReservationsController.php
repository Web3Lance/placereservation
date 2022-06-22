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
        if ($this->request->is(['post'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
        }
        $this->set(compact('reservation'));
        $this->set("title", "Detail reservation");
    }

    
    
}