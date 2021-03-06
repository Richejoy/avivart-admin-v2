<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Images', 'ProductCategories', 'ProductTypes', 'Currencies', 'Conversions'],
            'order' => ['Products.id' => 'ASC']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Images', 'ProductCategories', 'ProductTypes', 'Currencies', 'Conversions'],
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {

            $product = $this->Products->patchEntity($product, $this->request->getData());

            $product->user_id = $this->Auth->user('id');

            $product->image = $this->Products->Images->patchEntity(
                $this->Products->Images->newEntity(),
                [
                    'folder' => 'products',
                    'url' => 'default.jpg',
                    'link' => self::IMG_PROD_URL . 'products/default.jpg'
                ]
            );

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $productCategories = $this->Products->ProductCategories->find('list', ['keyField' => 'id', 'valueField' => 'full_name'])->contain(['ProductRays']);

        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $currencies = $this->Products->Currencies->find('list', ['limit' => 200]);
        $conversions = $this->Products->Conversions->find('list', ['limit' => 200]);

        $this->set(compact('product', 'productCategories', 'productTypes', 'currencies', 'conversions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }

        $productCategories = $this->Products->ProductCategories->find('list', ['keyField' => 'id', 'valueField' => 'full_name'])->contain(['ProductRays']);
        
        $productTypes = $this->Products->ProductTypes->find('list', ['limit' => 200]);
        $currencies = $this->Products->Currencies->find('list', ['limit' => 200]);
        $conversions = $this->Products->Conversions->find('list', ['limit' => 200]);

        $this->set(compact('product', 'productCategories', 'productTypes', 'currencies', 'conversions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
