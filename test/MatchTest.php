<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Calculator\Match;
use Calculator\Operations\Div;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
    const EXCEPTION = 'exception';

    protected $testData = [
        [
            'name' => 'sum',
            'operation' => '+',
            'first' => 4,
            'second' => 3,
            'result' => 7
        ],
        [
            'name' => 'sub',
            'operation' => '-',
            'first' => 4,
            'second' => 3,
            'result' => 1
        ],
        [
            'name' => 'mul',
            'operation' => '*',
            'first' => 4,
            'second' => 3,
            'result' => 12
        ],
        [
            'name' => 'div',
            'operation' => '/',
            'first' => 4,
            'second' => 3,
            'result' => 1
        ],
        [
            'name' => 'divZero',
            'operation' => '/',
            'first' => 4,
            'second' => 0,
            'result' => self::EXCEPTION,
            self::EXCEPTION => Div::ERROR_ZERO
        ],
        [
            'name' => 'operationUnknown',
            'operation' => 'sum',
            'first' => 4,
            'second' => 3,
            'result' => self::EXCEPTION,
            self::EXCEPTION => Match::ERROR_OPERATION_UNKNOWN
        ],
        [
            'name' => 'notOperation',
            'operation' => '',
            'first' => 4,
            'second' => 3,
            'result' => self::EXCEPTION,
            self::EXCEPTION => Match::ERROR_OPERATION_IS_NOT_EXIST
        ],
    ];

    public function runTest()
    {
        $calculator = new Match();
        foreach ($this->testData as $test)
        {
            $this->expectOutputString($test['name']);
            if ($test['result'] == self::EXCEPTION) {

                $this->expectException($test[self::EXCEPTION]);
                $calculator->calc($test['first'], $test['second'], $test['operation']);

            } else {

                $this->assertEquals($calculator->calc($test['first'], $test['second'], $test['operation']), $test['result']);
            }
        }
    }
}
