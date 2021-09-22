<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticleCategories Controller
 *
 * @property \App\Model\Table\ArticleCategoriesTable $ArticleCategories
 *
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'ArticleRays'],
            'order' => ['ArticleCategories.id' => 'ASC']
        ];
        $articleCategories = $this->paginate($this->ArticleCategories);

        $this->set(compact('articleCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articleCategory = $this->ArticleCategories->get($id, [
            'contain' => ['Images', 'ArticleRays', 'Articles'],
        ]);

        $this->set('articleCategory', $articleCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleCategory = $this->ArticleCategories->newEntity();
        if ($this->request->is('post')) {

            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());

            $articleCategory->image = $this->ArticleCategories->Images->patchEntity(
                $this->ArticleCategories->Images->newEntity(),
                [
                    'folder' => 'article_categories',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'article_categories/default.jpg'
                ]
            );

            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article category could not be saved. Please, try again.'));
        }
        $images = $this->ArticleCategories->Images->find('list', ['limit' => 200]);
        $articleRays = $this->ArticleCategories->ArticleRays->find('list', ['limit' => 200]);
        $this->set(compact('articleCategory', 'images', 'articleRays'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleCategory = $this->ArticleCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());
            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article category could not be saved. Please, try again.'));
        }
        $images = $this->ArticleCategories->Images->find('list', ['limit' => 200]);
        $articleRays = $this->ArticleCategories->ArticleRays->find('list', ['limit' => 200]);
        $this->set(compact('articleCategory', 'images', 'articleRays'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleCategory = $this->ArticleCategories->get($id);
        if ($this->ArticleCategories->delete($articleCategory)) {
            $this->Flash->success(__('The article category has been deleted.'));
        } else {
            $this->Flash->error(__('The article category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
