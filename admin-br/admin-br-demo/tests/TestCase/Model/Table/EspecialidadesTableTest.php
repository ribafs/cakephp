<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EspecialidadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EspecialidadesTable Test Case
 */
class EspecialidadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EspecialidadesTable
     */
    public $Especialidades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Especialidades',
        'app.Casos',
        'app.Medicos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Especialidades') ? [] : ['className' => EspecialidadesTable::class];
        $this->Especialidades = TableRegistry::getTableLocator()->get('Especialidades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Especialidades);

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
