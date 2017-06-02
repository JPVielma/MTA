<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promotore Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $numero
 * @property string $correo
 * @property \Cake\I18n\Time $fechaNacimiento
 * @property int $sexo
 * @property int $idComunidad
 */
class Promotore extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
