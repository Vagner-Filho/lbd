<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnderecosPedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnderecosPedidosTable Test Case
 */
class EnderecosPedidosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnderecosPedidosTable
     */
    public $EnderecosPedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.EnderecosPedidos',
        'app.Pedidos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EnderecosPedidos') ? [] : ['className' => EnderecosPedidosTable::class];
        $this->EnderecosPedidos = TableRegistry::getTableLocator()->get('EnderecosPedidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EnderecosPedidos);

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
