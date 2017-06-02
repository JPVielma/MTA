<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedallaspromotoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedallaspromotoresTable Test Case
 */
class MedallaspromotoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedallaspromotoresTable
     */
    public $Medallaspromotores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medallaspromotores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Medallaspromotores') ? [] : ['className' => 'App\Model\Table\MedallaspromotoresTable'];
        $this->Medallaspromotores = TableRegistry::get('Medallaspromotores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medallaspromotores);

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
