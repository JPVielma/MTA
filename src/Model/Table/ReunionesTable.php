<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reuniones Model
 *
 * @method \App\Model\Entity\Reunione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reunione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reunione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reunione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reunione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reunione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reunione findOrCreate($search, callable $callback = null, $options = [])
 */
class ReunionesTable extends Table
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

        $this->table('reuniones');
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
            ->integer('idPromotor')
            ->requirePresence('idPromotor', 'create')
            ->notEmpty('idPromotor');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->integer('participantes')
            ->requirePresence('participantes', 'create')
            ->notEmpty('participantes');

        return $validator;
    }
}
