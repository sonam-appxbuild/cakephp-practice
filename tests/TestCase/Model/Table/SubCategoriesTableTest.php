<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubCategoriesTable Test Case
 */
class SubCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubCategoriesTable
     */
    protected $SubCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SubCategories',
        'app.Categories',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SubCategories') ? [] : ['className' => SubCategoriesTable::class];
        $this->SubCategories = $this->getTableLocator()->get('SubCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SubCategories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
