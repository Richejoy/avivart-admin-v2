<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommunicationCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommunicationCategoriesTable Test Case
 */
class CommunicationCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommunicationCategoriesTable
     */
    public $CommunicationCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CommunicationCategories',
        'app.Communications',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CommunicationCategories') ? [] : ['className' => CommunicationCategoriesTable::class];
        $this->CommunicationCategories = TableRegistry::getTableLocator()->get('CommunicationCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommunicationCategories);

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
