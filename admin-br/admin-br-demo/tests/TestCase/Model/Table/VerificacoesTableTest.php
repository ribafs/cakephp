<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VerificacoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VerificacoesTable Test Case
 */
class VerificacoesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VerificacoesTable
     */
    public $Verificacoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Verificacoes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Verificacoes') ? [] : ['className' => VerificacoesTable::class];
        $this->Verificacoes = TableRegistry::getTableLocator()->get('Verificacoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Verificacoes);

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
