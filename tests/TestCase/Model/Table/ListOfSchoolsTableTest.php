<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListOfSchoolsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListOfSchoolsTable Test Case
 */
class ListOfSchoolsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ListOfSchoolsTable
     */
    protected $ListOfSchools;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ListOfSchools',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ListOfSchools') ? [] : ['className' => ListOfSchoolsTable::class];
        $this->ListOfSchools = $this->getTableLocator()->get('ListOfSchools', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ListOfSchools);

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
}
