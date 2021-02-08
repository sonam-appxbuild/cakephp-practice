<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndividualClientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndividualClientsTable Test Case
 */
class IndividualClientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IndividualClientsTable
     */
    protected $IndividualClients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IndividualClients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('IndividualClients') ? [] : ['className' => IndividualClientsTable::class];
        $this->IndividualClients = $this->getTableLocator()->get('IndividualClients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IndividualClients);

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
