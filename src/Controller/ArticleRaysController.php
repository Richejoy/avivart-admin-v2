<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticleRays Controller
 *
 * @property \App\Model\Table\ArticleRaysTable $ArticleRays
 *
 * @method \App\Model\Entity\ArticleRay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleRaysController extends AppController
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
            'order' => ['ArticleRays.id' => 'ASC']
        ];
        $articleRays = $this->paginate($this->ArticleRays);

        $this->set(compact('articleRays'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Ray id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articleRay = $this->ArticleRays->get($id, [
            'contain' => ['Images', 'ArticleCategories'],
        ]);

        $this->set('articleRay', $articleRay);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleRay = $this->ArticleRays->newEntity();
        if ($this->request->is('post')) {

            $articleRay = $this->ArticleRays->patchEntity($articleRay, $this->request->getData());

            $articleRay->image = $this->ArticleRays->Images->patchEntity(
                $this->ArticleRays->Images->newEntity(),
                [
                    'folder' => 'article_rays',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'article_rays/default.jpg'
                ]
            );

            if ($this->ArticleRays->save($articleRay)) {
                $this->Flash->success(__('The article ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article ray could not be saved. Please, try again.'));
        }
        $images = $this->ArticleRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('articleRay', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Ray id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleRay = $this->ArticleRays->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleRay = $this->ArticleRays->patchEntity($articleRay, $this->request->getData());
            if ($this->ArticleRays->save($articleRay)) {
                $this->Flash->success(__('The article ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article ray could not be saved. Please, try again.'));
        }
        $images = $this->ArticleRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('articleRay', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Ray id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleRay = $this->ArticleRays->get($id);
        if ($this->ArticleRays->delete($articleRay)) {
            $this->Flash->success(__('The article ray has been deleted.'));
        } else {
            $this->Flash->error(__('The article ray could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
