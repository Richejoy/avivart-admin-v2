<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductRays Controller
 *
 * @property \App\Model\Table\ProductRaysTable $ProductRays
 *
 * @method \App\Model\Entity\ProductRay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductRaysController extends AppController
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
            'order' => ['ProductRays.id' => 'ASC']
        ];
        $productRays = $this->paginate($this->ProductRays);

        $this->set(compact('productRays'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Ray id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productRay = $this->ProductRays->get($id, [
            'contain' => ['Images', 'ProductCategories'],
        ]);

        $this->set('productRay', $productRay);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productRay = $this->ProductRays->newEntity();
        if ($this->request->is('post')) {
            
            $productRay = $this->ProductRays->patchEntity($productRay, $this->request->getData());

            $productRay->image = $this->ProductRays->Images->patchEntity(
                $this->ProductRays->Images->newEntity(),
                [
                    'folder' => 'product_rays',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'product_rays/default.jpg'
                ]
            );
            
            if ($this->ProductRays->save($productRay)) {
                $this->Flash->success(__('The product ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product ray could not be saved. Please, try again.'));
        }
        $images = $this->ProductRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('productRay', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Ray id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productRay = $this->ProductRays->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productRay = $this->ProductRays->patchEntity($productRay, $this->request->getData());
            if ($this->ProductRays->save($productRay)) {
                $this->Flash->success(__('The product ray has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product ray could not be saved. Please, try again.'));
        }
        $images = $this->ProductRays->Images->find('list', ['limit' => 200]);
        $this->set(compact('productRay', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Ray id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productRay = $this->ProductRays->get($id);
        if ($this->ProductRays->delete($productRay)) {
            $this->Flash->success(__('The product ray has been deleted.'));
        } else {
            $this->Flash->error(__('The product ray could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
