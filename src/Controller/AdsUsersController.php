<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdsUsers Controller
 *
 * @property \App\Model\Table\AdsUsersTable $AdsUsers
 *
 * @method \App\Model\Entity\AdsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Ads'],
        ];
        $adsUsers = $this->paginate($this->AdsUsers);

        $this->set(compact('adsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Ads User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adsUser = $this->AdsUsers->get($id, [
            'contain' => ['Users', 'Ads'],
        ]);

        $this->set('adsUser', $adsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adsUser = $this->AdsUsers->newEntity();
        if ($this->request->is('post')) {
            $adsUser = $this->AdsUsers->patchEntity($adsUser, $this->request->getData());
            if ($this->AdsUsers->save($adsUser)) {
                $this->Flash->success(__('The ads user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ads user could not be saved. Please, try again.'));
        }
        $users = $this->AdsUsers->Users->find('list', ['limit' => 200]);
        $ads = $this->AdsUsers->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adsUser', 'users', 'ads'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ads User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adsUser = $this->AdsUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adsUser = $this->AdsUsers->patchEntity($adsUser, $this->request->getData());
            if ($this->AdsUsers->save($adsUser)) {
                $this->Flash->success(__('The ads user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ads user could not be saved. Please, try again.'));
        }
        $users = $this->AdsUsers->Users->find('list', ['limit' => 200]);
        $ads = $this->AdsUsers->Ads->find('list', ['limit' => 200]);
        $this->set(compact('adsUser', 'users', 'ads'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ads User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adsUser = $this->AdsUsers->get($id);
        if ($this->AdsUsers->delete($adsUser)) {
            $this->Flash->success(__('The ads user has been deleted.'));
        } else {
            $this->Flash->error(__('The ads user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
