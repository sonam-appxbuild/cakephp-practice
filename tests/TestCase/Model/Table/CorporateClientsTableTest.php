<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporateClientsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporateClientsTable Test Case
 */
class CorporateClientsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporateClientsTable
     */
    protected $CorporateClients;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CorporateClients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CorporateClients') ? [] : ['className' => CorporateClientsTable::class];
        $this->CorporateClients = $this->getTableLocator()->get('CorporateClients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CorporateClients);

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
