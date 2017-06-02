<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AtributosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AtributosTable Test Case
 */
class AtributosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AtributosTable
     */
    public $Atributos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.atributos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Atributos') ? [] : ['className' => 'App\Model\Table\AtributosTable'];
        $this->Atributos = TableRegistry::get('Atributos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Atributos);

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
