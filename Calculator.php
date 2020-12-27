<?php

declare (strict_types=1);

class Calculator
{
    public CONST ADD = 'add';
    public CONST SUBTRACT = 'subtract';
    public CONST MULTIPLY = 'multiply';
    public CONST DIVIDE = 'divide';
    public CONST FACTORIAL = 'factorial';
    public CONST TO_THE_POWER_OF = 'to the power of';

    public CONST DOUBLE_TYPE = 'double';

    private float $firstNumber;
    private float $secondNumber;

    public function __construct(float $firstNumber, float $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
    }

    public function setFirstNumber(float $firstNumber): void
    {
        $this->firstNumber = $firstNumber;
    }

    public function getFirstNumber(): float
    {
        return $this->firstNumber;
    }

    public function getSecondNumber(): float
    {
        return $this->secondNumber;
    }

    public function setSecondNumber(float $secondNumber): void
    {
        $this->secondNumber = $secondNumber;
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

