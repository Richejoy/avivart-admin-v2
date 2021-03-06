<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'ArticleCategories', 'ArticleTypes', 'Currencies', 'Conversions'],
            'order' => ['Articles.id' => 'ASC']
        ];
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['ArticleCategories', 'ArticleTypes', 'Currencies', 'Conversions', 'Images'],
        ]);

        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {

            $article = $this->Articles->patchEntity($article, $this->request->getData());

            $article->user_id = $this->Auth->user('id');

            $article->image = $this->Articles->Images->patchEntity(
                $this->Articles->Images->newEntity(),
                [
                    'folder' => 'articles',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'articles/default.jpg'
                ]
            );

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $articleCategories = $this->Articles->ArticleCategories->find('list', ['limit' => 200]);
        $articleTypes = $this->Articles->ArticleTypes->find('list', ['limit' => 200]);
        $currencies = $this->Articles->Currencies->find('list', ['limit' => 200]);
        $conversions = $this->Articles->Conversions->find('list', ['limit' => 200]);

        $this->set(compact('article', 'articleCategories', 'articleTypes', 'currencies', 'conversions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $articleCategories = $this->Articles->ArticleCategories->find('list', ['limit' => 200]);
        $articleTypes = $this->Articles->ArticleTypes->find('list', ['limit' => 200]);
        $currencies = $this->Articles->Currencies->find('list', ['limit' => 200]);
        $conversions = $this->Articles->Conversions->find('list', ['limit' => 200]);

        $this->set(compact('article', 'articleCategories', 'articleTypes', 'currencies', 'conversions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
