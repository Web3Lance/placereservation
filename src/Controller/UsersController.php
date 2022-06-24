<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public $paginate = [
        'limit' => 5,
        'finder' => 'published',    
       
    ];
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        $this->loadComponent('Paginator');
        $this->loadModel("Users");
    }

    public function addUser()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('L\'utilisateur a été créé.'));
                return $this->redirect(['action' => 'listUsers']);
            }
            if ($user->errors()) {
                $this->Flash->error(__('Échec de la création de l\'utilisateur. Veuillez réessayer.'));
                // Entity failed validation.
            }
        }
        $this->set("title", "Add User");
        $this->set(compact("user"));
    }

    public function listUsers()
    {
        $users = $this->Paginator->paginate($this->Users->find());
        $this->set("title", "List User");
        $this->set(compact("users"));
    }

    public function editUser($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Les données utilisateur ont été mises à jour avec succès.'));

                return $this->redirect(['action' => 'listUsers']);
            }
            $this->Flash->error(__('L\'utilisateur n\'a pas pu être mis à jour. Veuillez réessayer.'));
        }
        $this->set(compact('user'));
        $this->set("title", "Edit User");
    }
    public function deleteUser($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('L\'utilisateur a été supprimé'));
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a pas pu être supprimé. Veuillez réessayer.'));
        }

        return $this->redirect(['action' => 'listUsers']);
    }
}