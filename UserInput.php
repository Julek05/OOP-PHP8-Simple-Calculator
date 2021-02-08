<?php

declare (strict_types=1);

include('Calculator.php');
include('UserInputInterface.php');

class UserInput implements UserInputInterface
{
    private CalculatorInterface $calculator;
    private int $chosenMathematicalOperation;

    private CONST ADD = 1;
    private CONST SUBTRACT = 2;
    private CONST MULTIPLY = 3;
    private CONST DIVIDE = 4;
    private CONST FACTORIAL = 5;
    private CONST TO_THE_POWER_OF = 6;
    private CONST ALL_MATHEMATICAL_OPERATIONS = 7;

    public function __construct(CalculatorInterface $calculator, int $chosenMathematicalOperation)
    {
        $this->calculator = $calculator;
        $this->chosenMathematicalOperation = $chosenMathematicalOperation;
    }

    private function printResult(float|string $result, string $mathematicalOperation = ''): void
    {
        if (gettype($result) === Calculator::DOUBLE_TYPE) {
            echo "\nResult of " . $mathematicalOperation . ' of numbers: ' . $this->calculator->getFirstNumber()
                . ' and ' . $this->calculator->getSecondNumber() . ' is ' .  $result . "\n";
        } else {
            echo $result . "\n";
        }
    }

    public function calculateAll(): void
    {
        $mathematicalOperations = $this->calculator->getMathematicalOperations();
        foreach ($mathematicalOperations as $mathematicalOperation => $result) {
            $this->printResult($result, $mathematicalOperation);
        }
    }

    private function isCalculateAllOption(): bool
    {
        return $this->chosenMathematicalOperation === self::ALL_MATHEMATICAL_OPERATIONS;
    }

    public function calculateForChosenMathematicalOperation(): void
    {
        if ($this->isCalculateAllOption()) {
            $this->calculateAll();
            return;
        }

        [$result, $mathematicalOperation] = match ($this->chosenMathematicalOperation) {
            self::ADD => [$this->calculator->add(), Calculator::ADD],
            self::SUBTRACT => [$this->calculator->subtract(), Calculator::SUBTRACT],
            self::MULTIPLY => [$this->calculator->multiply(), Calculator::MULTIPLY],
            self::DIVIDE => [$this->calculator->divide(), Calculator::DIVIDE],
            self::FACTORIAL => [$this->calculator->factorial(), Calculator::FACTORIAL],
            self::TO_THE_POWER_OF => [$this->calculator->toThePowerOf(), Calculator::TO_THE_POWER_OF],
            default => ['Error, wrong mathematical operation.', ''],
        };

        $this->printResult($result, $mathematicalOperation);
    }
}

echo 'Enter, a first number: ';
$firstNumber = (int)readline();
echo 'Enter, a second number: ';
$secondNumber = (int)readline();

echo "Choose, a mathematical operation: \n 1 - " . Calculator::ADD . "\n 2 - " . Calculator::SUBTRACT .
    "\n 3 - " . Calculator::MULTIPLY . "\n 4 - " . Calculator::DIVIDE . "\n 5 - " . Calculator::FACTORIAL .
    "\n 6 - " . Calculator::TO_THE_POWER_OF . "\n 7 - all\n";
$mathematicalOperation = (int)readline();

$userInput = new UserInput(new Calculator($firstNumber, $secondNumber), $mathematicalOperation);

$userInput->calculateForChosenMathematicalOperation();

