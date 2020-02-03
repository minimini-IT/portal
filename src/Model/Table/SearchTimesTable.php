<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SearchTimes Model
 *
 * @method \App\Model\Entity\SearchTime get($primaryKey, $options = [])
 * @method \App\Model\Entity\SearchTime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SearchTime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SearchTime|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchTime saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SearchTime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SearchTime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SearchTime findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SearchTimesTable extends Table
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

        $this->setTable('search_times');
        $this->setDisplayField('search_times_id');
        $this->setPrimaryKey('search_times_id');

        $this->addBehavior('Timestamp');
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
            ->integer('search_times_id')
            ->allowEmptyString('search_times_id', null, 'create');

        $validator
            ->scalar('time')
            ->maxLength('time', 32)
            ->requirePresence('time', 'create')
            ->notEmptyString('time');

        return $validator;
    }
}
