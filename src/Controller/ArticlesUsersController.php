<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesUsers Controller
 *
 * @property \App\Model\Table\ArticlesUsersTable $ArticlesUsers
 *
 * @method \App\Model\Entity\ArticlesUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles', 'Users'],
        ];
        $articlesUsers = $this->paginate($this->ArticlesUsers);

        $this->set(compact('articlesUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesUser = $this->ArticlesUsers->get($id, [
            'contain' => ['Articles', 'Users'],
        ]);

        $this->set('articlesUser', $articlesUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesUser = $this->ArticlesUsers->newEntity();
        if ($this->request->is('post')) {
            $articlesUser = $this->ArticlesUsers->patchEntity($articlesUser, $this->request->getData());
            if ($this->ArticlesUsers->save($articlesUser)) {
                $this->Flash->success(__('The articles user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles user could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesUsers->Articles->find('list', ['limit' => 200]);
        $users = $this->ArticlesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('articlesUser', 'articles', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesUser = $this->ArticlesUsers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesUser = $this->ArticlesUsers->patchEntity($articlesUser, $this->request->getData());
            if ($this->ArticlesUsers->save($articlesUser)) {
                $this->Flash->success(__('The articles user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles user could not be saved. Please, try again.'));
        }
        $articles = $this->ArticlesUsers->Articles->find('list', ['limit' => 200]);
        $users = $this->ArticlesUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('articlesUser', 'articles', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesUser = $this->ArticlesUsers->get($id);
        if ($this->ArticlesUsers->delete($articlesUser)) {
            $this->Flash->success(__('The articles user has been deleted.'));
        } else {
            $this->Flash->error(__('The articles user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
