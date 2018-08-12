<?php

namespace Calculator\Operations;

use Calculator\Interfaces\OperationInterface;
use Exception;

class Div implements OperationInterface
{
    const ERROR_ZERO = 1;

    private $errors = [
        self::ERROR_ZERO => 'Cannot comply division by zero'
    ];

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function calc(int $a, int $b): int
    {
        if (0 === (int)$b) {
            $this->throwException(self::ERROR_ZERO);
        }
        return floor($a / $b);
    }

    /**
     * Exceptions
     *
     * @param int $code
     * @param string $msg
     * @throws Exception
     */
    protected function throwException(int $code, string $msg = ''): void
    {
        throw new Exception(
            $this->errors[$code] . ($msg ? ' ' . $msg : ''),
            $code
        );
    }
}