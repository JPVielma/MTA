<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TraspatiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TraspatiosTable Test Case
 */
class TraspatiosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TraspatiosTable
     */
    public $Traspatios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.traspatios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Traspatios') ? [] : ['className' => 'App\Model\Table\TraspatiosTable'];
        $this->Traspatios = TableRegistry::get('Traspatios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Traspatios);

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
