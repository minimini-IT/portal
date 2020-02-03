<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SalonInformations Model
 *
 * @property \App\Model\Table\MunicipalitiesTable&\Cake\ORM\Association\BelongsTo $Municipalities
 *
 * @method \App\Model\Entity\SalonInformation get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalonInformation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SalonInformation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalonInformation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalonInformation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalonInformation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalonInformation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalonInformation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalonInformationsTable extends Table
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

        $this->setTable('salon_informations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('salon_informations_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Municipalities', [
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
            ->integer('salon_informations_id')
            ->allowEmptyString('salon_informations_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('tel')
            ->maxLength('tel', 64)
            ->requirePresence('tel', 'create')
            ->notEmptyString('tel');

        $validator
            ->scalar('business_hour')
            ->maxLength('business_hour', 32)
            ->requirePresence('business_hour', 'create')
            ->notEmptyString('business_hour');

        $validator
            ->scalar('street_address')
            ->maxLength('street_address', 255)
            ->requirePresence('street_address', 'create')
            ->notEmptyString('street_address');

        $validator
            ->scalar('regular_holiday')
            ->maxLength('regular_holiday', 255)
            ->requirePresence('regular_holiday', 'create')
            ->notEmptyString('regular_holiday');

        $validator
            ->integer('number_of_staff')
            ->requirePresence('number_of_staff', 'create')
            ->notEmptyString('number_of_staff');

        $validator
            ->integer('number_of_seat')
            ->requirePresence('number_of_seat', 'create')
            ->notEmptyString('number_of_seat');

        $validator
            ->integer('number_of_parking')
            ->requirePresence('number_of_parking', 'create')
            ->notEmptyString('number_of_parking');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['municipalities_id'], 'Municipalities'));

        return $rules;
    }

}
