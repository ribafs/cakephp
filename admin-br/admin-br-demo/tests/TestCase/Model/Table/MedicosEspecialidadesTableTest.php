<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedicosEspecialidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedicosEspecialidadesTable Test Case
 */
class MedicosEspecialidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MedicosEspecialidadesTable
     */
    public $MedicosEspecialidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MedicosEspecialidades',
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
        $config = TableRegistry::getTableLocator()->exists('MedicosEspecialidades') ? [] : ['className' => MedicosEspecialidadesTable::class];
        $this->MedicosEspecialidades = TableRegistry::getTableLocator()->get('MedicosEspecialidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MedicosEspecialidades);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
