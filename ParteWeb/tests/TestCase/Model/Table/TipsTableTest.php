<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipsTable Test Case
 */
class TipsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipsTable
     */
    protected $Tips;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Tips',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tips') ? [] : ['className' => TipsTable::class];
        $this->Tips = $this->getTableLocator()->get('Tips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tips);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
