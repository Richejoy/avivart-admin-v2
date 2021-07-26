<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdTypes Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\AdsTable&\Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\AdType get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdType findOrCreate($search, callable $callback = null, $options = [])
 */
class AdTypesTable extends Table
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

        $this->setTable('ad_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'ad_type_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']));
        $rules->add($rules->existsIn(['image_id'], 'Images'));

        return $rules;
    }
}
