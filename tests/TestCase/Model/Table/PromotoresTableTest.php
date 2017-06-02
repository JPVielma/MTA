<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PromotoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PromotoresTable Test Case
 */
class PromotoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PromotoresTable
     */
    public $Promotores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.promotores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Promotores') ? [] : ['className' => 'App\Model\Table\PromotoresTable'];
        $this->Promotores = TableRegistry::get('Promotores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Promotores);

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
