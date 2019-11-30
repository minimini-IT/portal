<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\CarendarComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\CarendarComponent Test Case
 */
class CarendarComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\CarendarComponent
     */
    public $Carendar;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Carendar = new CarendarComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carendar);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
