<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdFormulas Controller
 *
 * @property \App\Model\Table\AdFormulasTable $AdFormulas
 *
 * @method \App\Model\Entity\AdFormula[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdFormulasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ads', 'Formulas'],
        ];
        $adFormulas = $this->paginate($this->AdFormulas);

        $this->set(compact('adFormulas'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad Formula id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adFormula = $this->AdFormulas->get($id, [
            'contain' => ['Ads', 'Formulas'],
        ]);

        $this->set('adFormula', $adFormula);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adFormula = $this->AdFormulas->newEntity();
        if ($this->request->is('post')) {
            $adFormula = $this->AdFormulas->patchEntity($adFormula, $this->request->getData());
            if ($this->AdFormulas->save($adFormula)) {
                $this->Flash->success(__('The ad formula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad formula could not be saved. Please, try again.'));
        }
        $ads = $this->AdFormulas->Ads->find('list', ['limit' => 200]);
        $formulas = $this->AdFormulas->Formulas->find('list', ['limit' => 200]);
        $this->set(compact('adFormula', 'ads', 'formulas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Formula id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adFormula = $this->AdFormulas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adFormula = $this->AdFormulas->patchEntity($adFormula, $this->request->getData());
            if ($this->AdFormulas->save($adFormula)) {
                $this->Flash->success(__('The ad formula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad formula could not be saved. Please, try again.'));
        }
        $ads = $this->AdFormulas->Ads->find('list', ['limit' => 200]);
        $formulas = $this->AdFormulas->Formulas->find('list', ['limit' => 200]);
        $this->set(compact('adFormula', 'ads', 'formulas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Formula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adFormula = $this->AdFormulas->get($id);
        if ($this->AdFormulas->delete($adFormula)) {
            $this->Flash->success(__('The ad formula has been deleted.'));
        } else {
            $this->Flash->error(__('The ad formula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
