<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Beneficiario Entity
 *
 * @property int $id
 * @property string $Nombre
 * @property string $Apellido
 * @property \Cake\I18n\Time $fecha_nacimiento
 * @property int $sexo
 * @property int $idPromotor
 * @property int $idComunidad
 * @property string $curp
 */
class Beneficiario extends Entity
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
