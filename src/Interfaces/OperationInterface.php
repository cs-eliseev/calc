<?php

namespace Calculator\Interfaces;

interface OperationInterface
{
    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function calc(int $a, int $b): int;
}