<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropostasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropostasTable Test Case
 */
class PropostasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PropostasTable
     */
    public $Propostas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Propostas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Propostas') ? [] : ['className' => PropostasTable::class];
        $this->Propostas = TableRegistry::getTableLocator()->get('Propostas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Propostas);

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
