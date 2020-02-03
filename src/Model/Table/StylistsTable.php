<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stylists Model
 *
 * @property \App\Model\Table\SalonInformationsTable&\Cake\ORM\Association\BelongsTo $SalonInformations
 *
 * @method \App\Model\Entity\Stylist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Stylist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Stylist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Stylist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stylist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Stylist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Stylist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Stylist findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StylistsTable extends Table
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

        $this->setTable('stylists');
        $this->setDisplayField('name');
        $this->setPrimaryKey('stylists_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SalonInformations', [
            'foreignKey' => 'salon_informations_id',
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
            ->integer('stylists_id')
            ->allowEmptyString('stylists_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->date('start_stylist')
            ->requirePresence('start_stylist', 'create')
            ->notEmptyDate('start_stylist');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmptyDate('birthday');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

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
        $rules->add($rules->existsIn(['salon_informations_id'], 'SalonInformations'));

        return $rules;
    }
}
