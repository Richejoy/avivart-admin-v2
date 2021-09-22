<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesOrders Controller
 *
 * @property \App\Model\Table\ArticlesOrdersTable $ArticlesOrders
 *
 * @method \App\Model\Entity\ArticlesOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Orders'],
        ];
        $articlesOrders = $this->paginate($this->ArticlesOrders);

        $this->set(compact('articlesOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesOrder = $this->ArticlesOrders->get($id, [
            'contain' => ['Articles', 'Orders'],
        ]);

        $this->set('articlesOrder', $articlesOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesOrder = $this->ArticlesOrders->newEntity();
        if ($this->request->is('post')) {
            $articlesOrder = $this->ArticlesOrders->patchEntity($articlesOrder, $this->request->getData());
            if ($this->ArticlesOrders->save($articlesOrder)) {
                $this->Flash->success(__('The articles order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles order could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesOrders->Articles->find('list', ['limit' => 200]);
        $orders = $this->ArticlesOrders->Orders->find('list', ['limit' => 200]);
        $this->set(compact('articlesOrder', 'articles', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesOrder = $this->ArticlesOrders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesOrder = $this->ArticlesOrders->patchEntity($articlesOrder, $this->request->getData());
            if ($this->ArticlesOrders->save($articlesOrder)) {
                $this->Flash->success(__('The articles order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles order could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesOrders->Articles->find('list', ['limit' => 200]);
        $orders = $this->ArticlesOrders->Orders->find('list', ['limit' => 200]);
        $this->set(compact('articlesOrder', 'articles', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesOrder = $this->ArticlesOrders->get($id);
        if ($this->ArticlesOrders->delete($articlesOrder)) {
            $this->Flash->success(__('The articles order has been deleted.'));
        } else {
            $this->Flash->error(__('The articles order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
