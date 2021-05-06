<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConversionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConversionsTable Test Case
 */
class ConversionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConversionsTable
     */
    public $Conversions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Conversions',
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
        $config = TableRegistry::getTableLocator()->exists('Conversions') ? [] : ['className' => ConversionsTable::class];
        $this->Conversions = TableRegistry::getTableLocator()->get('Conversions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Conversions);

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
