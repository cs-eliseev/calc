<?php

namespace Calculator\Operations;

use Calculator\Interfaces\OperationInterface;

class Add implements OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function calc(int $a, int $b): int
    {
        return $a + $b;
    }
}