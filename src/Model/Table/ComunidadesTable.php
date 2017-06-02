<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comunidades Model
 *
 * @method \App\Model\Entity\Comunidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Comunidade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Comunidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comunidade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Comunidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Comunidade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comunidade findOrCreate($search, callable $callback = null, $options = [])
 */
class ComunidadesTable extends Table
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

        $this->table('comunidades');
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
            ->integer('idMunicipio')
            ->requirePresence('idMunicipio', 'create')
            ->notEmpty('idMunicipio');

        $validator
            ->requirePresence('Nombre', 'create')
            ->notEmpty('Nombre');

        return $validator;
    }
}
