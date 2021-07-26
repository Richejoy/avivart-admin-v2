<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdsImages Controller
 *
 * @property \App\Model\Table\AdsImagesTable $AdsImages
 *
 * @method \App\Model\Entity\AdsImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdsImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Ads'],
        ];
        $adsImages = $this->paginate($this->AdsImages);

        $this->set(compact('adsImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Ads Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adsImage = $this->AdsImages->get($id, [
            'contain' => ['Images', 'Ads'],
        ]);

        $this->set('adsImage', $adsImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adsImage = $this->AdsImages->newEntity();
        if ($this->request->is('post')) {
            $adsImage = $this->AdsImages->patchEntity($adsImage, $this->request->getData());
            if ($this->AdsImages->save($adsImage)) {
                $this->Flash->success(__('The ads image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ads image could not be saved. Please, try again.'));
        }
        $images = $this->AdsImages->Images->find('list', ['limit' => 200]);
        $ads = $this->AdsImages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adsImage', 'images', 'ads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ads Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adsImage = $this->AdsImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adsImage = $this->AdsImages->patchEntity($adsImage, $this->request->getData());
            if ($this->AdsImages->save($adsImage)) {
                $this->Flash->success(__('The ads image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ads image could not be saved. Please, try again.'));
        }
        $images = $this->AdsImages->Images->find('list', ['limit' => 200]);
        $ads = $this->AdsImages->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adsImage', 'images', 'ads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ads Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adsImage = $this->AdsImages->get($id);
        if ($this->AdsImages->delete($adsImage)) {
            $this->Flash->success(__('The ads image has been deleted.'));
        } else {
            $this->Flash->error(__('The ads image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
