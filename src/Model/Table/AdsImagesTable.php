<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AdsImages Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\AdsTable&\Cake\ORM\Association\BelongsTo $Ads
 *
 * @method \App\Model\Entity\AdsImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\AdsImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AdsImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AdsImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdsImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AdsImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AdsImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AdsImage findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdsImagesTable extends Table
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

        $this->setTable('ads_images');
        $this->setDisplayField('ad_id');
        $this->setPrimaryKey(['ad_id', 'image_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Ads', [
            'foreignKey' => 'ad_id',
            'joinType' => 'INNER',
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['image_id'], 'Images'));
        $rules->add($rules->existsIn(['ad_id'], 'Ads'));

        return $rules;
    }
}
