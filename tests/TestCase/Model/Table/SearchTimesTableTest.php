<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchTimesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchTimesTable Test Case
 */
class SearchTimesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchTimesTable
     */
    public $SearchTimes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SearchTimes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SearchTimes') ? [] : ['className' => SearchTimesTable::class];
        $this->SearchTimes = TableRegistry::getTableLocator()->get('SearchTimes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SearchTimes);

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
}
