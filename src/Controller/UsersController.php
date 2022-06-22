<?php

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
       
        $this->loadModel("Users");
    }

    public function addUser()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been created.'));
                return $this->redirect(['action' => 'listUsers']);
            }
            $this->Flash->error(__('Failed to create user. Please, try again.'));
        }
        $this->set("title", "Add User");
        $this->set(compact("user"));
    }

    public function listUsers()
    {
        $users = $this->Users->find()->toList();
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
                $this->Flash->success(__('The user data has been updated successfully.'));

                return $this->redirect(['action' => 'listUsers']);
            }
            $this->Flash->error(__('The user could not be updated. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set("title", "Edit User");
    }

    public function deleteUser($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'listUsers']);
    }
}