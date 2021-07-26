<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdRaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdRaysTable Test Case
 */
class AdRaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdRaysTable
     */
    public $AdRays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AdRays',
        'app.Images',
        'app.AdCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdRays') ? [] : ['className' => AdRaysTable::class];
        $this->AdRays = TableRegistry::getTableLocator()->get('AdRays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdRays);

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
