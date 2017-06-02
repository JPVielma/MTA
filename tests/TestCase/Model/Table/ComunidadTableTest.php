<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComunidadTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComunidadTable Test Case
 */
class ComunidadTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComunidadTable
     */
    public $Comunidad;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.comunidad'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Comunidad') ? [] : ['className' => 'App\Model\Table\ComunidadTable'];
        $this->Comunidad = TableRegistry::get('Comunidad', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comunidad);

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
