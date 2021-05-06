<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrderStates Controller
 *
 * @property \App\Model\Table\OrderStatesTable $OrderStates
 *
 * @method \App\Model\Entity\OrderState[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderStatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $orderStates = $this->paginate($this->OrderStates);

        $this->set(compact('orderStates'));
    }

    /**
     * View method
     *
     * @param string|null $id Order State id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderState = $this->OrderStates->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set('orderState', $orderState);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderState = $this->OrderStates->newEntity();
        if ($this->request->is('post')) {
            $orderState = $this->OrderStates->patchEntity($orderState, $this->request->getData());
            if ($this->OrderStates->save($orderState)) {
                $this->Flash->success(__('The order state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order state could not be saved. Please, try again.'));
        }
        $this->set(compact('orderState'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order State id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderState = $this->OrderStates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderState = $this->OrderStates->patchEntity($orderState, $this->request->getData());
            if ($this->OrderStates->save($orderState)) {
                $this->Flash->success(__('The order state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order state could not be saved. Please, try again.'));
        }
        $this->set(compact('orderState'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order State id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderState = $this->OrderStates->get($id);
        if ($this->OrderStates->delete($orderState)) {
            $this->Flash->success(__('The order state has been deleted.'));
        } else {
            $this->Flash->error(__('The order state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
