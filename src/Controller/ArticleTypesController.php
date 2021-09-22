<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticleTypes Controller
 *
 * @property \App\Model\Table\ArticleTypesTable $ArticleTypes
 *
 * @method \App\Model\Entity\ArticleType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleTypesController extends AppController
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
            'order' => ['ArticleTypes.id' => 'ASC']
        ];
        $articleTypes = $this->paginate($this->ArticleTypes);

        $this->set(compact('articleTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Type id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articleType = $this->ArticleTypes->get($id, [
            'contain' => ['Images', 'Articles'],
        ]);

        $this->set('articleType', $articleType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleType = $this->ArticleTypes->newEntity();
        if ($this->request->is('post')) {

            $articleType = $this->ArticleTypes->patchEntity($articleType, $this->request->getData());

            $articleType->image = $this->ArticleTypes->Images->patchEntity(
                $this->ArticleTypes->Images->newEntity(),
                [
                    'folder' => 'article_types',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'article_types/default.jpg'
                ]
            );

            if ($this->ArticleTypes->save($articleType)) {
                $this->Flash->success(__('The article type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article type could not be saved. Please, try again.'));
        }
        $images = $this->ArticleTypes->Images->find('list', ['limit' => 200]);
        $this->set(compact('articleType', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleType = $this->ArticleTypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleType = $this->ArticleTypes->patchEntity($articleType, $this->request->getData());
            if ($this->ArticleTypes->save($articleType)) {
                $this->Flash->success(__('The article type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article type could not be saved. Please, try again.'));
        }
        $images = $this->ArticleTypes->Images->find('list', ['limit' => 200]);
        $this->set(compact('articleType', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleType = $this->ArticleTypes->get($id);
        if ($this->ArticleTypes->delete($articleType)) {
            $this->Flash->success(__('The article type has been deleted.'));
        } else {
            $this->Flash->error(__('The article type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
