<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedallasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedallasTable Test Case
 */
class MedallasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedallasTable
     */
    public $Medallas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medallas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Medallas') ? [] : ['className' => 'App\Model\Table\MedallasTable'];
        $this->Medallas = TableRegistry::get('Medallas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medallas);

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
