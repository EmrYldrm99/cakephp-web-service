<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlatoonsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlatoonsTable Test Case
 */
class PlatoonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlatoonsTable
     */
    protected $Platoons;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Platoons',
        'app.Accounts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Platoons') ? [] : ['className' => PlatoonsTable::class];
        $this->Platoons = $this->getTableLocator()->get('Platoons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Platoons);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PlatoonsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
