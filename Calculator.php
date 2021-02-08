<?php

declare (strict_types=1);

include('CalculatorInterface.php');

class Calculator implements CalculatorInterface
{
    public const ADD = 'add';
    public const SUBTRACT = 'subtract';
    public const MULTIPLY = 'multiply';
    public const DIVIDE = 'divide';
    public const FACTORIAL = 'factorial';
    public const TO_THE_POWER_OF = 'to the power of';

    public const DOUBLE_TYPE = 'double';

    private float $firstNumber;
    private float $secondNumber;

    public function __construct(float $firstNumber, float $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
    }

    public function getFirstNumber(): float
    {
        return $this->firstNumber;
    }

    public function getSecondNumber(): float
    {
        return $this->secondNumber;
    }

    public function add(): float
    {
        return $this->firstNumber + $this->secondNumber;
    }

    public function subtract(): float
    {
        return $this->firstNumber - $this->secondNumber;
    }

    public function multiply(): float
    {
        return $this->firstNumber * $this->secondNumber;
    }

    public function divide(): float|string
    {
        return $this->secondNumber === 0.0
            ? "Fail, you can't divide by 0"
            : $this->firstNumber / $this->secondNumber;
    }

    public function factorial(): float
    {
        $factorial = $this->firstNumber;
        for ($i = 1; $i <= $this->secondNumber; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }

    private function isFloatingSecondNumber(): bool
    {
        return str_contains((string)$this->secondNumber, '.');
    }

    public function toThePowerOf(): float|string
    {
        if ($this->isFloatingSecondNumber()) {
            return "You can't raise to a float type given power";
        }

        $thePowerOf = $this->firstNumber;
        for ($i = 0; $i < $this->secondNumber; $i++) {
            $thePowerOf *= $this->firstNumber;
        }
        return $thePowerOf;
    }

    public function getMathematicalOperations(): array
    {
        return [
            self::ADD => $this->add(),
            self::SUBTRACT => $this->subtract(),
            self::MULTIPLY => $this->multiply(),
            self::DIVIDE => $this->divide(),
            self::FACTORIAL => $this->factorial(),
            self::TO_THE_POWER_OF => $this->toThePowerOf()
        ];
    }
}

