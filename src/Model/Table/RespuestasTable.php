<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Respuestas Model
 *
 * @method \App\Model\Entity\Respuesta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Respuesta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Respuesta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Respuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Respuesta findOrCreate($search, callable $callback = null, $options = [])
 */
class RespuestasTable extends Table
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

        $this->table('respuestas');
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
            ->integer('idPregunta')
            ->requirePresence('idPregunta', 'create')
            ->notEmpty('idPregunta');

        $validator
            ->requirePresence('respuesta', 'create')
            ->notEmpty('respuesta');

        return $validator;
    }
}
