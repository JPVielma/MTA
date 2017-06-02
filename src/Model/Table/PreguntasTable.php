<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Preguntas Model
 *
 * @method \App\Model\Entity\Pregunta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pregunta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pregunta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pregunta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pregunta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pregunta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pregunta findOrCreate($search, callable $callback = null, $options = [])
 */
class PreguntasTable extends Table
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

        $this->table('preguntas');
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
            ->requirePresence('pregunta', 'create')
            ->notEmpty('pregunta');

        return $validator;
    }
}
