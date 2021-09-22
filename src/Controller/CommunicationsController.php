<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Communications Controller
 *
 * @property \App\Model\Table\CommunicationsTable $Communications
 *
 * @method \App\Model\Entity\Communication[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommunicationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CommunicationCategories', 'Users'],
            'order' => ['Communications.id' => 'ASC']
        ];
        $communications = $this->paginate($this->Communications);

        $this->set(compact('communications'));
    }

    /**
     * View method
     *
     * @param string|null $id Communication id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $communication = $this->Communications->get($id, [
            'contain' => ['CommunicationCategories', 'Users'],
        ]);

        $this->set('communication', $communication);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $communication = $this->Communications->newEntity();
        if ($this->request->is('post')) {

            $communication = $this->Communications->patchEntity($communication, $this->request->getData());

            $communication->user_id = $this->Auth->user('id');

            if ($this->Communications->save($communication)) {
                $this->Flash->success(__('The communication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The communication could not be saved. Please, try again.'));
        }
        $communicationCategories = $this->Communications->CommunicationCategories->find('list', ['limit' => 200]);

        $this->set(compact('communication', 'communicationCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Communication id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $communication = $this->Communications->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $communication = $this->Communications->patchEntity($communication, $this->request->getData());
            if ($this->Communications->save($communication)) {
                $this->Flash->success(__('The communication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The communication could not be saved. Please, try again.'));
        }
        $communicationCategories = $this->Communications->CommunicationCategories->find('list', ['limit' => 200]);

        $this->set(compact('communication', 'communicationCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Communication id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $communication = $this->Communications->get($id);
        if ($this->Communications->delete($communication)) {
            $this->Flash->success(__('The communication has been deleted.'));
        } else {
            $this->Flash->error(__('The communication could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
