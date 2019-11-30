<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReservationDatetimes Model
 *
 * @method \App\Model\Entity\ReservationDatetime get($primaryKey, $options = [])
 * @method \App\Model\Entity\ReservationDatetime newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ReservationDatetime[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ReservationDatetime|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReservationDatetime saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ReservationDatetime patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ReservationDatetime[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ReservationDatetime findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationDatetimesTable extends Table
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

        $this->setTable('reservation_datetimes');
        $this->setDisplayField('reservation_datetimes_id');
        $this->setPrimaryKey('reservation_datetimes_id');

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
            ->integer('reservation_datetimes_id')
            ->allowEmptyString('reservation_datetimes_id', null, 'create');

        $validator
            ->dateTime('reservation_datetime')
            ->requirePresence('reservation_datetime', 'create')
            ->notEmptyDateTime('reservation_datetime');

        return $validator;
    }
}
