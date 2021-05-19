<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsUsers Controller
 *
 * @property \App\Model\Table\ProductsUsersTable $ProductsUsers
 *
 * @method \App\Model\Entity\ProductsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Users'],
            'order' => ['ProductsUsers.id' => 'ASC']
        ];
        $productsUsers = $this->paginate($this->ProductsUsers);

        $this->set(compact('productsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Products User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsUser = $this->ProductsUsers->get($id, [
            'contain' => ['Products', 'Users'],
        ]);

        $this->set('productsUser', $productsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsUser = $this->ProductsUsers->newEntity();
        if ($this->request->is('post')) {
            $productsUser = $this->ProductsUsers->patchEntity($productsUser, $this->request->getData());
            if ($this->ProductsUsers->save($productsUser)) {
                $this->Flash->success(__('The products user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products user could not be saved. Please, try again.'));
        }
        $products = $this->ProductsUsers->Products->find('list', ['limit' => 200]);
        $users = $this->ProductsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('productsUser', 'products', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsUser = $this->ProductsUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsUser = $this->ProductsUsers->patchEntity($productsUser, $this->request->getData());
            if ($this->ProductsUsers->save($productsUser)) {
                $this->Flash->success(__('The products user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products user could not be saved. Please, try again.'));
        }
        $products = $this->ProductsUsers->Products->find('list', ['limit' => 200]);
        $users = $this->ProductsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('productsUser', 'products', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsUser = $this->ProductsUsers->get($id);
        if ($this->ProductsUsers->delete($productsUser)) {
            $this->Flash->success(__('The products user has been deleted.'));
        } else {
            $this->Flash->error(__('The products user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
