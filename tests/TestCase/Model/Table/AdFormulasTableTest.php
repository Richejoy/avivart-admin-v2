<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdFormulasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdFormulasTable Test Case
 */
class AdFormulasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdFormulasTable
     */
    public $AdFormulas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AdFormulas',
        'app.Ads',
        'app.Formulas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AdFormulas') ? [] : ['className' => AdFormulasTable::class];
        $this->AdFormulas = TableRegistry::getTableLocator()->get('AdFormulas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdFormulas);

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
