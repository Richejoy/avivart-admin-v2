<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductsImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductsImagesTable Test Case
 */
class ProductsImagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductsImagesTable
     */
    public $ProductsImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductsImages',
        'app.Images',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductsImages') ? [] : ['className' => ProductsImagesTable::class];
        $this->ProductsImages = TableRegistry::getTableLocator()->get('ProductsImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductsImages);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
