<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Countries', 'Civilities', 'UserTypes', 'Roles'],
            'order' => ['Users.id' => 'ASC']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Images', 'Countries', 'Civilities', 'UserTypes', 'Roles', 'Products', 'Admins', 'Orders', 'Payments', 'Transactions'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->image = $this->Users->Images->patchEntity(
                $this->Users->Images->newEntity(),
                [
                    'folder' => 'users',
                    'url' => 'avatar10.png',
                    'link' => self::IMG_PROD_URL . 'users/avatar10.png'
                ]
            );

            if ($this->Users->save($user)) {

                $this->_autoSaveAppropriateUser($user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $countries = $this->Users->Countries->find('list', ['limit' => 300]);
        $civilities = $this->Users->Civilities->find('list', ['limit' => 200]);
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'civilities', 'userTypes', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $oldUser = clone $user = $this->Users->get($id, [
            'contain' => ['Products'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $this->_autoDeleteAppropriateUser($oldUser, $user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $countries = $this->Users->Countries->find('list', ['limit' => 300]);
        $civilities = $this->Users->Civilities->find('list', ['limit' => 200]);
        $userTypes = $this->Users->UserTypes->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'countries', 'civilities', 'userTypes', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    *
    */
    private function _autoSaveAppropriateUser($user)
    {
        switch (intval($user->user_type_id)) {
            case 1:   //Admin
                $this->loadModel('Admins');

                $admin = $this->Admins->patchEntity(
                    $this->Admins->newEntity(),
                    [
                        'user_id' => $user->id,
                    ]
                );

                $this->Admins->save($admin);

                $user->image->folder = 'admins';
                $this->Users->Images->save($user->image);
                break;

            case 2:   //User
                # code...
                break;
                    
            default:
                # code...
                break;
        }
    }

    private function _autoDeleteAppropriateUser($oldUser, $user)
    {
        switch (intval($oldUser->user_type_id)) {
            case 1:   //Admin
                if ($user->user_type_id != 1) {
                    $this->loadModel('Admins');

                    $admin = $this->Admins->find()->where([
                        'user_id' => $user->id,
                    ])->first();

                    $this->Admins->delete($admin);

                    switch (intval($user->user_type_id)) {
                        case 2: //user
                            $user->image->folder = 'users';
                            $this->Users->Images->save($user->image);
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                }
                break;

            case 2:   //User
                # code...
                break;
                    
            default:
                # code...
                break;
        }
    }
}
