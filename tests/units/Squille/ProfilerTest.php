<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Test;

use Burdz\Squille\Profiler;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
    protected $profiler;

    protected function setUp()
    {
        parent::setUp();
        $output = $this->getMockBuilder('\Burdz\Squille\Profiler\Output\OutputInterface')
            ->setMockClassName('OutputInterface')
            ->getMock();
        $this->profiler = new Profiler($output);
    }

    public function testPushCollectorReturnsProfiler()
    {
        $collector = $this->getMockBuilder('\Burdz\Squille\Profiler\Collector\CollectorInterface')
            ->setMockClassName('CollectorInterface')
            ->getMock();
        $profiler = $this->profiler->pushCollector($collector);
        $this->assertInstanceOf('Burdz\Squille\Profiler', $profiler);
    }
}