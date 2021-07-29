<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formulas Controller
 *
 * @property \App\Model\Table\FormulasTable $Formulas
 *
 * @method \App\Model\Entity\Formula[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FormulasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Currencies'],
        ];
        $formulas = $this->paginate($this->Formulas);

        $this->set(compact('formulas'));
    }

    /**
     * View method
     *
     * @param string|null $id Formula id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formula = $this->Formulas->get($id, [
            'contain' => ['Currencies', 'AdFormulas'],
        ]);

        $this->set('formula', $formula);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formula = $this->Formulas->newEntity();
        if ($this->request->is('post')) {
            $formula = $this->Formulas->patchEntity($formula, $this->request->getData());
            if ($this->Formulas->save($formula)) {
                $this->Flash->success(__('The formula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formula could not be saved. Please, try again.'));
        }
        $currencies = $this->Formulas->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('formula', 'currencies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Formula id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formula = $this->Formulas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formula = $this->Formulas->patchEntity($formula, $this->request->getData());
            if ($this->Formulas->save($formula)) {
                $this->Flash->success(__('The formula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The formula could not be saved. Please, try again.'));
        }
        $currencies = $this->Formulas->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('formula', 'currencies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Formula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formula = $this->Formulas->get($id);
        if ($this->Formulas->delete($formula)) {
            $this->Flash->success(__('The formula has been deleted.'));
        } else {
            $this->Flash->error(__('The formula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
