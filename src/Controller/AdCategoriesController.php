<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdCategories Controller
 *
 * @property \App\Model\Table\AdCategoriesTable $AdCategories
 *
 * @method \App\Model\Entity\AdCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'AdRays'],
            'order' => ['AdCategories.id' => 'ASC']
        ];
        $adCategories = $this->paginate($this->AdCategories);

        $this->set(compact('adCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adCategory = $this->AdCategories->get($id, [
            'contain' => ['Images', 'AdRays', 'Ads'],
        ]);

        $this->set('adCategory', $adCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adCategory = $this->AdCategories->newEntity();
        if ($this->request->is('post')) {

            $adCategory = $this->AdCategories->patchEntity($adCategory, $this->request->getData());

            $adCategory->image = $this->AdCategories->Images->patchEntity(
                $this->AdCategories->Images->newEntity(),
                [
                    'folder' => 'ad_categories',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'ad_categories/default.jpg'
                ]
            );

            if ($this->AdCategories->save($adCategory)) {
                $this->Flash->success(__('The ad category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad category could not be saved. Please, try again.'));
        }
        $images = $this->AdCategories->Images->find('list', ['limit' => 200]);
        $adRays = $this->AdCategories->AdRays->find('list', ['limit' => 200]);
        $this->set(compact('adCategory', 'images', 'adRays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adCategory = $this->AdCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adCategory = $this->AdCategories->patchEntity($adCategory, $this->request->getData());
            if ($this->AdCategories->save($adCategory)) {
                $this->Flash->success(__('The ad category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad category could not be saved. Please, try again.'));
        }
        $images = $this->AdCategories->Images->find('list', ['limit' => 200]);
        $adRays = $this->AdCategories->AdRays->find('list', ['limit' => 200]);
        $this->set(compact('adCategory', 'images', 'adRays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adCategory = $this->AdCategories->get($id);
        if ($this->AdCategories->delete($adCategory)) {
            $this->Flash->success(__('The ad category has been deleted.'));
        } else {
            $this->Flash->error(__('The ad category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
