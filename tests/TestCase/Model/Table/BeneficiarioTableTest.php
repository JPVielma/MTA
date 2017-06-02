<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BeneficiarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BeneficiarioTable Test Case
 */
class BeneficiarioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BeneficiarioTable
     */
    public $Beneficiario;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.beneficiario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Beneficiario') ? [] : ['className' => 'App\Model\Table\BeneficiarioTable'];
        $this->Beneficiario = TableRegistry::get('Beneficiario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Beneficiario);

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
