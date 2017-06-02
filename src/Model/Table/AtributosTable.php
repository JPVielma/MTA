<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Atributos Model
 *
 * @method \App\Model\Entity\Atributo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Atributo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Atributo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Atributo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Atributo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Atributo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Atributo findOrCreate($search, callable $callback = null, $options = [])
 */
class AtributosTable extends Table
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

        $this->table('atributos');
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
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->numeric('criterioAceptacion')
            ->requirePresence('criterioAceptacion', 'create')
            ->notEmpty('criterioAceptacion');

        $validator
            ->integer('idMedalla')
            ->requirePresence('idMedalla', 'create')
            ->notEmpty('idMedalla');

        return $validator;
    }
}
