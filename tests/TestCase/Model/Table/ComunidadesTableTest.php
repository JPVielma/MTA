<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComunidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComunidadesTable Test Case
 */
class ComunidadesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ComunidadesTable
     */
    public $Comunidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.comunidades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Comunidades') ? [] : ['className' => 'App\Model\Table\ComunidadesTable'];
        $this->Comunidades = TableRegistry::get('Comunidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Comunidades);

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
