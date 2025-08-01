<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecyclingCentersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecyclingCentersTable Test Case
 */
class RecyclingCentersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecyclingCentersTable
     */
    protected $RecyclingCenters;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RecyclingCenters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RecyclingCenters') ? [] : ['className' => RecyclingCentersTable::class];
        $this->RecyclingCenters = $this->getTableLocator()->get('RecyclingCenters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RecyclingCenters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RecyclingCentersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
