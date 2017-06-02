<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReunionesFixture
 *
 */
class ReunionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'idPromotor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nombre' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'participantes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'idPromotor' => ['type' => 'index', 'columns' => ['idPromotor'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'reuniones_ibfk_1' => ['type' => 'foreign', 'columns' => ['idPromotor'], 'references' => ['promotores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'reuniones_ibfk_2' => ['type' => 'foreign', 'columns' => ['idPromotor'], 'references' => ['promotores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'reuniones_ibfk_3' => ['type' => 'foreign', 'columns' => ['idPromotor'], 'references' => ['promotores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'reuniones_ibfk_4' => ['type' => 'foreign', 'columns' => ['idPromotor'], 'references' => ['promotores', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'idPromotor' => 1,
            'nombre' => 'Lorem ipsum dolor sit amet',
            'fecha' => '2017-03-28',
            'participantes' => 1
        ],
    ];
}
