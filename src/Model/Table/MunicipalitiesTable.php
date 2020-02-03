<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Municipalities Model
 *
 * @method \App\Model\Entity\Municipality get($primaryKey, $options = [])
 * @method \App\Model\Entity\Municipality newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Municipality[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Municipality|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Municipality saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Municipality patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Municipality[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Municipality findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MunicipalitiesTable extends Table
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

        $this->setTable('municipalities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('municipalities_id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SalonInformations', [
            'foreignKey' => 'municipalities_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('municipalities_id')
            ->allowEmptyString('municipalities_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
