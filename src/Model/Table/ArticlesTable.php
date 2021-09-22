<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\ImagesTable&\Cake\ORM\Association\BelongsTo $Images
 * @property \App\Model\Table\ArticleCategoriesTable&\Cake\ORM\Association\BelongsTo $ArticleCategories
 * @property \App\Model\Table\ArticleTypesTable&\Cake\ORM\Association\BelongsTo $ArticleTypes
 * @property \App\Model\Table\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \App\Model\Table\ConversionsTable&\Cake\ORM\Association\BelongsTo $Conversions
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsToMany $Orders
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Images', [
            'foreignKey' => 'image_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ArticleCategories', [
            'foreignKey' => 'article_category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ArticleTypes', [
            'foreignKey' => 'article_type_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Conversions', [
            'foreignKey' => 'conversion_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        /*$this->belongsToMany('Images', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'image_id',
            'joinTable' => 'articles_images',
        ]);
        $this->belongsToMany('Orders', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'articles_orders',
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'article_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'articles_users',
        ]);*/
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
            ->numeric('old_price')
            ->requirePresence('old_price', 'create')
            ->notEmptyString('old_price');

        $validator
            ->numeric('new_price')
            ->requirePresence('new_price', 'create')
            ->notEmptyString('new_price');

        $validator
            ->numeric('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->boolean('on_discount')
            ->notEmptyString('on_discount');

        $validator
            ->boolean('published')
            ->notEmptyString('published');

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
        $rules->add($rules->existsIn(['article_category_id'], 'ArticleCategories'));
        $rules->add($rules->existsIn(['article_type_id'], 'ArticleTypes'));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        $rules->add($rules->existsIn(['conversion_id'], 'Conversions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
