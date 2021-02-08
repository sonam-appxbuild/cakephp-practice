<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WpWcOrderStatsFixture
 */
class WpWcOrderStatsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'order_id' => ['type' => 'biginteger', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'parent_id' => ['type' => 'biginteger', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'date_created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => ''],
        'date_created_gmt' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => '0000-00-00 00:00:00', 'comment' => ''],
        'num_items_sold' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'total_sales' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'tax_total' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'shipping_total' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'net_total' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => ''],
        'returning_customer' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '', 'precision' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => null, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'date_created' => ['type' => 'index', 'columns' => ['date_created'], 'length' => []],
            'customer_id' => ['type' => 'index', 'columns' => ['customer_id'], 'length' => []],
            'status' => ['type' => 'index', 'columns' => ['status'], 'length' => ['status' => '191']],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['order_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'order_id' => 1,
                'parent_id' => 1,
                'date_created' => '2021-01-13 10:09:50',
                'date_created_gmt' => '2021-01-13 10:09:50',
                'num_items_sold' => 1,
                'total_sales' => 1,
                'tax_total' => 1,
                'shipping_total' => 1,
                'net_total' => 1,
                'returning_customer' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'customer_id' => 1,
            ],
        ];
        parent::init();
    }
}
