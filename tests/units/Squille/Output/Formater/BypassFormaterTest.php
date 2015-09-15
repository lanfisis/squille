<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Squille\Test\Profiler\Output\Formater;

use Burdz\Squille\Profiler\Output\Formater\BypassFormater;

class BypassFormaterTest extends \PHPUnit_Framework_TestCase
{
    protected $formater;

    protected function setUp()
    {
        parent::setUp();
        $this->formater = new BypassFormater();
    }

    public function testFormat()
    {
        $result = array('foo' => 'bar', 'baz' => 'foo');
        $format = $this->formater->format(array('foo' => 'bar', 'baz' => 'foo'));
        $this->assertEquals($format, $result);
    }
}
