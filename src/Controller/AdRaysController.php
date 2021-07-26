<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdRays Controller
 *
 * @property \App\Model\Table\AdRaysTable $AdRays
 *
 * @method \App\Model\Entity\AdRay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdRaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images'],
            'order' => ['AdRays.id' => 'ASC']
        ];
        $adRays = $this->paginate($this->AdRays);

        $this->set(compact('adRays'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad Ray id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adRay = $this->AdRays->get($id, [
            'contain' => ['Images', 'AdCategories'],
        ]);

        $this->set('adRay', $adRay);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adRay = $this->AdRays->newEntity();
        if ($this->request->is('post')) {

            $adRay = $this->AdRays->patchEntity($adRay, $this->request->getData());

            $adRay->image = $this->AdRays->Images->patchEntity(
                $this->AdRays->Images->newEntity(),
                [
                    'folder' => 'ad_rays',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'ad_rays/default.jpg'
                ]
            );

            if ($this->AdRays->save($adRay)) {
                $this->Flash->success(__('The ad ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad ray could not be saved. Please, try again.'));
        }
        $images = $this->AdRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('adRay', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Ray id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adRay = $this->AdRays->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adRay = $this->AdRays->patchEntity($adRay, $this->request->getData());
            if ($this->AdRays->save($adRay)) {
                $this->Flash->success(__('The ad ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad ray could not be saved. Please, try again.'));
        }
        $images = $this->AdRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('adRay', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Ray id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adRay = $this->AdRays->get($id);
        if ($this->AdRays->delete($adRay)) {
            $this->Flash->success(__('The ad ray has been deleted.'));
        } else {
            $this->Flash->error(__('The ad ray could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
