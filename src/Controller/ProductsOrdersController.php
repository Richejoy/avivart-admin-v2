<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsOrders Controller
 *
 * @property \App\Model\Table\ProductsOrdersTable $ProductsOrders
 *
 * @method \App\Model\Entity\ProductsOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Orders'],
            'order' => ['ProductsOrders.id' => 'ASC']
        ];
        $productsOrders = $this->paginate($this->ProductsOrders);

        $this->set(compact('productsOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Order id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsOrder = $this->ProductsOrders->get($id, [
            'contain' => ['Products', 'Orders'],
        ]);

        $this->set('productsOrder', $productsOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsOrder = $this->ProductsOrders->newEntity();
        if ($this->request->is('post')) {
            $productsOrder = $this->ProductsOrders->patchEntity($productsOrder, $this->request->getData());
            if ($this->ProductsOrders->save($productsOrder)) {
                $this->Flash->success(__('The products order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products order could not be saved. Please, try again.'));
        }
        $products = $this->ProductsOrders->Products->find('list', ['limit' => 200]);
        $orders = $this->ProductsOrders->Orders->find('list', ['limit' => 200]);
        $this->set(compact('productsOrder', 'products', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsOrder = $this->ProductsOrders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsOrder = $this->ProductsOrders->patchEntity($productsOrder, $this->request->getData());
            if ($this->ProductsOrders->save($productsOrder)) {
                $this->Flash->success(__('The products order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products order could not be saved. Please, try again.'));
        }
        $products = $this->ProductsOrders->Products->find('list', ['limit' => 200]);
        $orders = $this->ProductsOrders->Orders->find('list', ['limit' => 200]);
        $this->set(compact('productsOrder', 'products', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsOrder = $this->ProductsOrders->get($id);
        if ($this->ProductsOrders->delete($productsOrder)) {
            $this->Flash->success(__('The products order has been deleted.'));
        } else {
            $this->Flash->error(__('The products order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
