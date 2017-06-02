<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotores Model
 *
 * @method \App\Model\Entity\Promotore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Promotore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotore findOrCreate($search, callable $callback = null, $options = [])
 */
class PromotoresTable extends Table
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

        $this->table('promotores');
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->requirePresence('correo', 'create')
            ->notEmpty('correo');

        $validator
            ->date('fechaNacimiento')
            ->requirePresence('fechaNacimiento', 'create')
            ->notEmpty('fechaNacimiento');

        $validator
            ->integer('sexo')
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        return $validator;
    }
}
