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
    public function addReservation(){
        $reservation = $this->Reservations->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been created.'));
                return $this->redirect(['action' => 'addUsersreservation',"id" => $reservation->id,]);
            }
            if ($user->errors()) {
                $this->Flash->error(__('Failed to create user. Please, try again.'));
                // Entity failed validation.
            }
        }
        $this->set("title", "Nouveau réservation");
        $this->set(compact('reservation'));
        $this->viewBuilder()->setLayout('default');
    }

    public function addUsersreservation($id){

        $reservation = $this->Reservations->get($id, [
            'contain' => [],
        ]);
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been created.'));
            }
        }
        $this->set("title", "Ajouter utilisateurs pour cette réservation");
        $this->set(compact('reservation','user'));
        $this->viewBuilder()->setLayout('default');
    }

    
    
}