<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdCategoriesFixture
 */
class AdCategoriesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'image_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ad_ray_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'image_id' => ['type' => 'index', 'columns' => ['image_id'], 'length' => []],
            'ad_ray_id' => ['type' => 'index', 'columns' => ['ad_ray_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'name' => ['type' => 'unique', 'columns' => ['name', 'ad_ray_id'], 'length' => []],
            'ad_categories_ibfk_1' => ['type' => 'foreign', 'columns' => ['ad_ray_id'], 'references' => ['ad_rays', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'ad_categories_ibfk_2' => ['type' => 'foreign', 'columns' => ['image_id'], 'references' => ['images', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'image_id' => 1,
                'ad_ray_id' => 1,
            ],
        ];
        parent::init();
    }
}
