<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ads Controller
 *
 * @property \App\Model\Table\AdsTable $Ads
 *
 * @method \App\Model\Entity\Ad[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AdCategories', 'AdTypes', 'Currencies'],
            'order' => ['Ads.id' => 'ASC']
        ];
        $ads = $this->paginate($this->Ads);

        $this->set(compact('ads'));
    }

    /**
     * View method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['AdCategories', 'AdTypes', 'Currencies', 'Images', 'Users'],
        ]);

        $this->set('ad', $ad);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ad = $this->Ads->newEntity();
        if ($this->request->is('post')) {

            $ad = $this->Ads->patchEntity($ad, $this->request->getData());

            $ad->user_id = $this->Auth->user('id');

            $ad->image = $this->Ads->Images->patchEntity(
                $this->Ads->Images->newEntity(),
                [
                    'folder' => 'ads',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'ads/default.jpg'
                ]
            );

            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        $adCategories = $this->Ads->AdCategories->find('list', ['limit' => 200]);
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        $currencies = $this->Ads->Currencies->find('list', ['limit' => 200]);
        $images = $this->Ads->Images->find('list', ['limit' => 200]);
        $users = $this->Ads->Users->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'adCategories', 'adTypes', 'currencies', 'images', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ad = $this->Ads->get($id, [
            'contain' => ['Images', 'Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ad = $this->Ads->patchEntity($ad, $this->request->getData());
            if ($this->Ads->save($ad)) {
                $this->Flash->success(__('The ad has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ad could not be saved. Please, try again.'));
        }
        $adCategories = $this->Ads->AdCategories->find('list', ['limit' => 200]);
        $adTypes = $this->Ads->AdTypes->find('list', ['limit' => 200]);
        $currencies = $this->Ads->Currencies->find('list', ['limit' => 200]);
        $images = $this->Ads->Images->find('list', ['limit' => 200]);
        $users = $this->Ads->Users->find('list', ['limit' => 200]);
        $this->set(compact('ad', 'adCategories', 'adTypes', 'currencies', 'images', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ad id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ad = $this->Ads->get($id);
        if ($this->Ads->delete($ad)) {
            $this->Flash->success(__('The ad has been deleted.'));
        } else {
            $this->Flash->error(__('The ad could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
