<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Traspatios Model
 *
 * @method \App\Model\Entity\Traspatio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Traspatio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Traspatio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Traspatio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Traspatio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Traspatio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Traspatio findOrCreate($search, callable $callback = null, $options = [])
 */
class TraspatiosTable extends Table
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

        $this->table('traspatios');
        $this->displayField('id');
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
            ->integer('idBeneficiario')
            ->requirePresence('idBeneficiario', 'create')
            ->notEmpty('idBeneficiario');

        $validator
            ->numeric('mts')
            ->requirePresence('mts', 'create')
            ->notEmpty('mts');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        return $validator;
    }
}