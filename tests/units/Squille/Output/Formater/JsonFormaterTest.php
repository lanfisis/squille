<?php
/**
 * This file is part of Squille
 *
 * (c) David Buros <david.buros@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Burdz\Test\Squille\Output\Formater;

use Burdz\Squille\Output\Formater\JsonFormater;

class JsonFormaterTest extends \PHPUnit_Framework_TestCase
{
    protected $formater;

    protected function setUp()
    {
        parent::setUp();
        $this->formater = new JsonFormater();
    }

    public function testFormat()
    {
        $result =
'{
    "foo": "bar",
    "baz": "foo"
}';
        $format = $this->formater->format(array('foo' => 'bar', 'baz' => 'foo'));
        $this->assertEquals($format, $result);
    }
}