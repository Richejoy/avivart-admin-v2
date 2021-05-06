<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Conversions Controller
 *
 * @property \App\Model\Table\ConversionsTable $Conversions
 *
 * @method \App\Model\Entity\Conversion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConversionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $conversions = $this->paginate($this->Conversions);

        $this->set(compact('conversions'));
    }

    /**
     * View method
     *
     * @param string|null $id Conversion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conversion = $this->Conversions->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('conversion', $conversion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conversion = $this->Conversions->newEntity();
        if ($this->request->is('post')) {
            $conversion = $this->Conversions->patchEntity($conversion, $this->request->getData());
            if ($this->Conversions->save($conversion)) {
                $this->Flash->success(__('The conversion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversion could not be saved. Please, try again.'));
        }
        $this->set(compact('conversion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Conversion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conversion = $this->Conversions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conversion = $this->Conversions->patchEntity($conversion, $this->request->getData());
            if ($this->Conversions->save($conversion)) {
                $this->Flash->success(__('The conversion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The conversion could not be saved. Please, try again.'));
        }
        $this->set(compact('conversion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Conversion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conversion = $this->Conversions->get($id);
        if ($this->Conversions->delete($conversion)) {
            $this->Flash->success(__('The conversion has been deleted.'));
        } else {
            $this->Flash->error(__('The conversion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
