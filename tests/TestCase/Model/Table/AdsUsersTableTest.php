<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdsUsersTable Test Case
 */
class AdsUsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AdsUsersTable
     */
    public $AdsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.AdsUsers',
        'app.Users',
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
        $config = TableRegistry::getTableLocator()->exists('AdsUsers') ? [] : ['className' => AdsUsersTable::class];
        $this->AdsUsers = TableRegistry::getTableLocator()->get('AdsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AdsUsers);

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
