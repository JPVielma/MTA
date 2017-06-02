<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Beneficiario Model
 *
 * @method \App\Model\Entity\Beneficiario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Beneficiario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Beneficiario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Beneficiario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Beneficiario findOrCreate($search, callable $callback = null, $options = [])
 */
class BeneficiarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('beneficiario');
        $this->displayField('nombre');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('Nombre', 'create')
            ->notEmpty('Nombre');

        $validator
            ->requirePresence('Apellido', 'create')
            ->notEmpty('Apellido');

        $validator
            ->date('fecha_nacimiento')
            ->requirePresence('fecha_nacimiento', 'create')
            ->notEmpty('fecha_nacimiento');

        $validator
            ->integer('sexo')
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->integer('idPromotor')
            ->requirePresence('idPromotor', 'create')
            ->notEmpty('idPromotor');

        $validator
            ->integer('idComunidad')
            ->requirePresence('idComunidad', 'create')
            ->notEmpty('idComunidad');

        $validator
            ->requirePresence('curp', 'create')
            ->notEmpty('curp');

        return $validator;
    }
}
