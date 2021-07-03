<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicosTable Test Case
 */
class MedicosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicosTable
     */
    public $Medicos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Medicos',
        'app.Especialidades',
        'app.Users',
        'app.Casos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Medicos') ? [] : ['className' => MedicosTable::class];
        $this->Medicos = TableRegistry::getTableLocator()->get('Medicos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medicos);

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
