<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pagos Model
 *
 * @method \App\Model\Entity\Pago get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pago newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pago[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pago|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pago[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pago findOrCreate($search, callable $callback = null, $options = [])
 */
class PagosTable extends Table
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

        $this->table('pagos');
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
            ->numeric('monto')
            ->requirePresence('monto', 'create')
            ->notEmpty('monto');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        return $validator;
    }
}
