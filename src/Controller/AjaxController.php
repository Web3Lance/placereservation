<?php

namespace App\Controller;

use App\Controller\AppController;
use SebastianBergmann\Environment\Console;
use Cake\Datasource\ConnectionManager;

class AjaxController extends AppController
{
    public $db;
    
    public function initialize(): void
    {
        parent::initialize();
       
        $this->db = ConnectionManager::get("default");
        $this->loadModel("Users");
        $this->loadModel("Reservations");
    }

    public function newstatus($id){
        
        $reservation = $this->Reservations->get($id, [
            'contain' => [],
        ]);
            $reservation->status = "waiting";
            if ($this->Reservations->save($reservation)) {

                echo json_encode(array(
                    "status" => 1,
                    "message" => "User has been created"
                )); 
                return $this->redirect(['controller' => 'Pages','action' => 'home',]);

            }

    }

    public function ajaxAddUser(){

        if ($this->request->is('ajax')) {
            
            $student = $this->Users->newEmptyEntity();

            $student = $this->Users->patchEntity($student, $this->request->getData());
            if ($this->Users->save($student)) {

                $this->Flash->success(__('L\'utilisateur a été créé'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "L'utilisateur a été créé"
                )); 

                exit;
            }

            $this->Flash->error(__('Échec de l\'enregistrement des données utilisateur'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Échec de la création"
            )); 

            exit;
        }
    }
    public function loadUsers()
    {
        if ($this->request->is("ajax")) {
            $params['draw'] = $_REQUEST['draw'];
            $start = $_REQUEST['start'];
            $length = $_REQUEST['length'];
            $search_value = $_REQUEST['search']['value'];
            $reservation_id = $_REQUEST['reservation_id'];

            if (!empty($search_value)) {
                // count all data
                $total_count = $this->db->execute("SELECT * from users 
                    WHERE (lastname like '%" . $search_value . "%' 
                    OR firstname like '%" . $search_value . "%' 
                    OR email like '%" . $search_value . "%' 
                    OR phone like '%" . $search_value . "%')
                    AND reservation_id = ".$reservation_id
                )->fetchAll('assoc');

                $data = $this->db->execute("SELECT * from users 
                    WHERE (firstname like '%" . $search_value . "%' 
                    OR lastname like '%" . $search_value . "%' 
                    OR email like '%" . $search_value . "%' 
                    OR phone like '%" . $search_value . "%')
                    AND reservation_id = ".$reservation_id." 
                    limit $start, $length"
                )->fetchAll('assoc');

            } else {
                // count all data
                $total_count = $this->db->execute("SELECT * from users WHERE reservation_id=". $reservation_id)->fetchAll('assoc');

                // get per page data
                $data = $this->db->execute("SELECT * from users  WHERE reservation_id=". $reservation_id." limit $start, $length")->fetchAll('assoc');
            }

            $json_data = array(
                "draw" => intval($params['draw']),
                "recordsTotal" => count($total_count),
                "recordsFiltered" => count($total_count),
                "data" => $data   // total data array
            );

            echo json_encode($json_data);
            die;
        }
    }

}