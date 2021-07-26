<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ads Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\AdCategoriesTable&\Cake\ORM\Association\BelongsTo $AdCategories
 * @property \App\Model\Table\AdTypesTable&\Cake\ORM\Association\BelongsTo $AdTypes
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsToMany $Images
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad findOrCreate($search, callable $callback = null, $options = [])
 */
class AdsTable extends Table
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

        $this->setTable('ads');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AdCategories', [
            'foreignKey' => 'ad_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AdTypes', [
            'foreignKey' => 'ad_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Images', [
            'foreignKey' => 'ad_id',
            'targetForeignKey' => 'image_id',
            'joinTable' => 'ads_images',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'ad_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'ads_users',
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
            ->maxLength('name', 60)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->scalar('characteristics')
            ->requirePresence('characteristics', 'create')
            ->notEmptyString('characteristics');

        $validator
            ->numeric('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->boolean('is_vip')
            ->notEmptyString('is_vip');

        $validator
            ->boolean('published')
            ->notEmptyString('published');

        $validator
            ->date('expire_date')
            ->requirePresence('expire_date', 'create')
            ->notEmptyDate('expire_date');

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
        $rules->add($rules->existsIn(['ad_category_id'], 'AdCategories'));
        $rules->add($rules->existsIn(['ad_type_id'], 'AdTypes'));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
