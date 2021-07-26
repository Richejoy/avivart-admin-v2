<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdCategories Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\AdRaysTable&\Cake\ORM\Association\BelongsTo $AdRays
 * @property \App\Model\Table\AdsTable&\Cake\ORM\Association\HasMany $Ads
 *
 * @method \App\Model\Entity\AdCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class AdCategoriesTable extends Table
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

        $this->setTable('ad_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AdRays', [
            'foreignKey' => 'ad_ray_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'ad_category_id',
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
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        $rules->add($rules->existsIn(['ad_ray_id'], 'AdRays'));

        return $rules;
    }
}
