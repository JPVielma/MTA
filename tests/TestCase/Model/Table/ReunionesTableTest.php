<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReunionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReunionesTable Test Case
 */
class ReunionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReunionesTable
     */
    public $Reuniones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reuniones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reuniones') ? [] : ['className' => 'App\Model\Table\ReunionesTable'];
        $this->Reuniones = TableRegistry::get('Reuniones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reuniones);

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
