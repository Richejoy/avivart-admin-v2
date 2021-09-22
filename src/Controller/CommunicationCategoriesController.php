<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CommunicationCategories Controller
 *
 * @property \App\Model\Table\CommunicationCategoriesTable $CommunicationCategories
 *
 * @method \App\Model\Entity\CommunicationCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommunicationCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $communicationCategories = $this->paginate($this->CommunicationCategories);

        $this->set(compact('communicationCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Communication Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $communicationCategory = $this->CommunicationCategories->get($id, [
            'contain' => ['Communications'],
        ]);

        $this->set('communicationCategory', $communicationCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $communicationCategory = $this->CommunicationCategories->newEntity();
        if ($this->request->is('post')) {
            $communicationCategory = $this->CommunicationCategories->patchEntity($communicationCategory, $this->request->getData());
            if ($this->CommunicationCategories->save($communicationCategory)) {
                $this->Flash->success(__('The communication category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The communication category could not be saved. Please, try again.'));
        }
        $this->set(compact('communicationCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Communication Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $communicationCategory = $this->CommunicationCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $communicationCategory = $this->CommunicationCategories->patchEntity($communicationCategory, $this->request->getData());
            if ($this->CommunicationCategories->save($communicationCategory)) {
                $this->Flash->success(__('The communication category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The communication category could not be saved. Please, try again.'));
        }
        $this->set(compact('communicationCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Communication Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $communicationCategory = $this->CommunicationCategories->get($id);
        if ($this->CommunicationCategories->delete($communicationCategory)) {
            $this->Flash->success(__('The communication category has been deleted.'));
        } else {
            $this->Flash->error(__('The communication category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
