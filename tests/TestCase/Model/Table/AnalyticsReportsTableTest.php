<?php
namespace Akshay\Test\TestCase\Model\Table;

use Akshay\Model\Table\AnalyticsReportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Akshay\Model\Table\AnalyticsReportsTable Test Case
 */
class AnalyticsReportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Akshay\Model\Table\AnalyticsReportsTable
     */
    public $AnalyticsReports;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.akshay.analytics_reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnalyticsReports') ? [] : ['className' => 'Akshay\Model\Table\AnalyticsReportsTable'];
        $this->AnalyticsReports = TableRegistry::get('AnalyticsReports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnalyticsReports);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
