<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArticlesImages Controller
 *
 * @property \App\Model\Table\ArticlesImagesTable $ArticlesImages
 *
 * @method \App\Model\Entity\ArticlesImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Articles'],
        ];
        $articlesImages = $this->paginate($this->ArticlesImages);

        $this->set(compact('articlesImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Articles Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articlesImage = $this->ArticlesImages->get($id, [
            'contain' => ['Images', 'Articles'],
        ]);

        $this->set('articlesImage', $articlesImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articlesImage = $this->ArticlesImages->newEntity();
        if ($this->request->is('post')) {
            $articlesImage = $this->ArticlesImages->patchEntity($articlesImage, $this->request->getData());
            if ($this->ArticlesImages->save($articlesImage)) {
                $this->Flash->success(__('The articles image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles image could not be saved. Please, try again.'));
        }
        $images = $this->ArticlesImages->Images->find('list', ['limit' => 200]);
        $articles = $this->ArticlesImages->Articles->find('list', ['limit' => 200]);
        $this->set(compact('articlesImage', 'images', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Articles Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articlesImage = $this->ArticlesImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articlesImage = $this->ArticlesImages->patchEntity($articlesImage, $this->request->getData());
            if ($this->ArticlesImages->save($articlesImage)) {
                $this->Flash->success(__('The articles image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The articles image could not be saved. Please, try again.'));
        }
        $images = $this->ArticlesImages->Images->find('list', ['limit' => 200]);
        $articles = $this->ArticlesImages->Articles->find('list', ['limit' => 200]);
        $this->set(compact('articlesImage', 'images', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Articles Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articlesImage = $this->ArticlesImages->get($id);
        if ($this->ArticlesImages->delete($articlesImage)) {
            $this->Flash->success(__('The articles image has been deleted.'));
        } else {
            $this->Flash->error(__('The articles image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
