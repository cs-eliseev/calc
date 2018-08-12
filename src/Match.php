<?php

namespace Calculator;


use Calculator\Operations\Add;
use Calculator\Operations\Div;
use Calculator\Operations\Mul;
use Calculator\Operations\Sub;
use Exception;

class Match
{
    const ERROR_OPERATION_UNKNOWN = 2;
    const ERROR_OPERATION_IS_NOT_EXIST = 3;

    private $errors = [
        self::ERROR_OPERATION_UNKNOWN => 'Unknown operation',
        self::ERROR_OPERATION_IS_NOT_EXIST => 'Operation is not exist'
    ];

    protected $calculator;

    /**
     * Calculator constructor.
     *
     * @param string $operation
     */
    public function __construct(string $operation = '')
    {
        if (!empty($operation)) $this->setOperator($operation);
    }

    /**
     * Set operator
     *
     * @param $operation
     */
    public function setOperator(string $operation): void
    {
        switch ($operation) {
            case '+':
                $this->calculator = new Add();
                break;

            case '-':
                $this->calculator = new Sub();
                break;

            case '*':
                $this->calculator = new Mul();
                break;

            case '/':
                $this->calculator = new Div();
                break;

            default :
                $this->throwException(self::ERROR_OPERATION_UNKNOWN);
        }
    }

    /**
     * Calculate
     *
     * @param int $a
     * @param int $b
     * @param string $operation
     * @return int
     */
    public function calc(int $a, int $b, string $operation = ''): int
    {

        if (!empty($operation)) $this->setOperator($operation);

        if (!is_object($this->calculator)) $this->throwException(self::ERROR_OPERATION_IS_NOT_EXIST);

        return $this->calculator->calc($a, $b);
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