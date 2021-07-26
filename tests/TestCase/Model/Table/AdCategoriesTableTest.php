<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdCategoriesTable Test Case
 */
class AdCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdCategoriesTable
     */
    public $AdCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AdCategories',
        'app.Images',
        'app.AdRays',
        'app.Ads',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdCategories') ? [] : ['className' => AdCategoriesTable::class];
        $this->AdCategories = TableRegistry::getTableLocator()->get('AdCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdCategories);

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
