<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalonInformationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalonInformationsTable Test Case
 */
class SalonInformationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalonInformationsTable
     */
    public $SalonInformations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SalonInformations',
        'app.Municipalities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SalonInformations') ? [] : ['className' => SalonInformationsTable::class];
        $this->SalonInformations = TableRegistry::getTableLocator()->get('SalonInformations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalonInformations);

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
