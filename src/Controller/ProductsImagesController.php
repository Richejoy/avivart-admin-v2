<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductsImages Controller
 *
 * @property \App\Model\Table\ProductsImagesTable $ProductsImages
 *
 * @method \App\Model\Entity\ProductsImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'Products'],
        ];
        $productsImages = $this->paginate($this->ProductsImages);

        $this->set(compact('productsImages'));
    }

    /**
     * View method
     *
     * @param string|null $id Products Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productsImage = $this->ProductsImages->get($id, [
            'contain' => ['Images', 'Products'],
        ]);

        $this->set('productsImage', $productsImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productsImage = $this->ProductsImages->newEntity();
        if ($this->request->is('post')) {
            $productsImage = $this->ProductsImages->patchEntity($productsImage, $this->request->getData());
            if ($this->ProductsImages->save($productsImage)) {
                $this->Flash->success(__('The products image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products image could not be saved. Please, try again.'));
        }
        $images = $this->ProductsImages->Images->find('list', ['limit' => 200]);
        $products = $this->ProductsImages->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsImage', 'images', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Products Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productsImage = $this->ProductsImages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productsImage = $this->ProductsImages->patchEntity($productsImage, $this->request->getData());
            if ($this->ProductsImages->save($productsImage)) {
                $this->Flash->success(__('The products image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The products image could not be saved. Please, try again.'));
        }
        $images = $this->ProductsImages->Images->find('list', ['limit' => 200]);
        $products = $this->ProductsImages->Products->find('list', ['limit' => 200]);
        $this->set(compact('productsImage', 'images', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Products Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productsImage = $this->ProductsImages->get($id);
        if ($this->ProductsImages->delete($productsImage)) {
            $this->Flash->success(__('The products image has been deleted.'));
        } else {
            $this->Flash->error(__('The products image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
