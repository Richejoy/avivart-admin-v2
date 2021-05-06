<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentModes Controller
 *
 * @property \App\Model\Table\PaymentModesTable $PaymentModes
 *
 * @method \App\Model\Entity\PaymentMode[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentModesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $paymentModes = $this->paginate($this->PaymentModes);

        $this->set(compact('paymentModes'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentMode = $this->PaymentModes->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set('paymentMode', $paymentMode);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentMode = $this->PaymentModes->newEntity();
        if ($this->request->is('post')) {
            $paymentMode = $this->PaymentModes->patchEntity($paymentMode, $this->request->getData());
            if ($this->PaymentModes->save($paymentMode)) {
                $this->Flash->success(__('The payment mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment mode could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentMode'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentMode = $this->PaymentModes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentMode = $this->PaymentModes->patchEntity($paymentMode, $this->request->getData());
            if ($this->PaymentModes->save($paymentMode)) {
                $this->Flash->success(__('The payment mode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment mode could not be saved. Please, try again.'));
        }
        $this->set(compact('paymentMode'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Mode id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentMode = $this->PaymentModes->get($id);
        if ($this->PaymentModes->delete($paymentMode)) {
            $this->Flash->success(__('The payment mode has been deleted.'));
        } else {
            $this->Flash->error(__('The payment mode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
