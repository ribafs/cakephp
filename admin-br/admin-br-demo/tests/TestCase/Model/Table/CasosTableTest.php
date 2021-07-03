<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CasosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CasosTable Test Case
 */
class CasosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CasosTable
     */
    public $Casos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Casos',
        'app.Medicos',
        'app.Especialidades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Casos') ? [] : ['className' => CasosTable::class];
        $this->Casos = TableRegistry::getTableLocator()->get('Casos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Casos);

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
