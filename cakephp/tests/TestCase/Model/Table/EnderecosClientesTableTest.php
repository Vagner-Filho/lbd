<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnderecosClientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnderecosClientesTable Test Case
 */
class EnderecosClientesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnderecosClientesTable
     */
    public $EnderecosClientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EnderecosClientes',
        'app.Clientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EnderecosClientes') ? [] : ['className' => EnderecosClientesTable::class];
        $this->EnderecosClientes = TableRegistry::getTableLocator()->get('EnderecosClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EnderecosClientes);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
