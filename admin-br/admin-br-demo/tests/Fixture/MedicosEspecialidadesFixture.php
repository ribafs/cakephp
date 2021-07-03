<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MedicosEspecialidadesFixture
 */
class MedicosEspecialidadesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'medico_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'especialidade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_esp' => ['type' => 'index', 'columns' => ['especialidade_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['medico_id', 'especialidade_id'], 'length' => []],
            'fk_esp' => ['type' => 'foreign', 'columns' => ['especialidade_id'], 'references' => ['especialidades', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_med' => ['type' => 'foreign', 'columns' => ['medico_id'], 'references' => ['medicos', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'medico_id' => 1,
                'especialidade_id' => 1,
            ],
        ];
        parent::init();
    }
}
