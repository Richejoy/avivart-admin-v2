<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleRaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleRaysTable Test Case
 */
class ArticleRaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleRaysTable
     */
    public $ArticleRays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ArticleRays',
        'app.Images',
        'app.ArticleCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticleRays') ? [] : ['className' => ArticleRaysTable::class];
        $this->ArticleRays = TableRegistry::getTableLocator()->get('ArticleRays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticleRays);

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
