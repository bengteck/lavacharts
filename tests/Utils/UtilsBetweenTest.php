<?php

namespace Khill\Lavacharts\Tests\Utils;

use \Khill\Lavacharts\Utils;

class UtilsBetweenTest extends \PHPUnit_Framework_TestCase
{
    public function testBetweenWithIntsInRange()
    {
        $this->assertTrue(Utils::between(0, 5, 10));
    }

    public function testBetweenWithIntsOutOfLowerRange()
    {
        $this->assertFalse(Utils::between(3, 1, 10));
    }

    public function testBetweenWithIntsOutOfUpperRange()
    {
        $this->assertFalse(Utils::between(6, 12, 10));
    }

    public function testBetweenWithIntsInRangeInclusive()
    {
        $this->assertTrue(Utils::between(1, 1, 10));
    }

    public function testBetweenWithIntsInRangeNonInclusive()
    {
        $this->assertFalse(Utils::between(1, 1, 10, false));
    }

    public function testBetweenWithFloatsInRange()
    {
        $this->assertTrue(Utils::between(5.7, 6.4, 10.6));
    }

    public function testBetweenWithFloatsOutOfLowerRange()
    {
        $this->assertFalse(Utils::between(8.8, 6.4, 10.6));
    }

    public function testBetweenWithFloatsOutOfUpperRange()
    {
        $this->assertFalse(Utils::between(6.4, 12.5, 10.6));
    }

    public function testBetweenWithFloatsInRangeInclusive()
    {
        $this->assertTrue(Utils::between(6.4, 6.4, 10.6));
    }

    public function testBetweenWithFloatsInRangeNonInclusive()
    {
        $this->assertFalse(Utils::between(6.4, 6.4, 10.6, false));
    }

    /**
     * @dataProvider badParamsProvider
     */
    public function testBetweenWithBadParams($lower, $test, $upper, $includeLimits = true)
    {
        $this->assertFalse(Utils::between($lower, $test, $upper, $includeLimits));
    }


    public function badParamsProvider()
    {
        return [
            [1, 2, 'string'],
            [1, 2, [], 3],
            [1, new \stdClass(), 3],
            [1, false, 3,],
            [[], [], []],
            [true, true, true],
            [false, false, false],
            [null, null, null],
            [new \stdClass(), new \stdClass(), new \stdClass()]
        ];
    }
}
