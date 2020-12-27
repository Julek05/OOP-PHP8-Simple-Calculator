<?php

declare (strict_types=1);

include ('Calculator.php');

class UserInput
{
    public Calculator $calculator;
    private int $chosenMathematicalOperation;

    public function __construct(int $firstNumber, int $secondNumber, int $chosenMathematicalOperation)
    {
        $this->calculator = new Calculator($firstNumber, $secondNumber);
        $this->chosenMathematicalOperation = $chosenMathematicalOperation;
    }

    public function printResult(float|string $result, string $mathematicalOperation = ''): void
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

    private function isCalculateAllOption()
    {
        return $this->chosenMathematicalOperation
            === Calculator::MATHEMATICAL_OPERATIONS[Calculator::ALL_MATHEMATICAL_OPERATIONS];
    }

    public function calculateForChosenMathematicalOperation(): void
    {
        if ($this->isCalculateAllOption()) {
            $this->calculateAll();
            return;
        }

        [$result, $mathematicalOperation] = match ($this->chosenMathematicalOperation) {
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::ADD] => [$this->calculator->add(), Calculator::ADD],
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::SUBTRACT] => [$this->calculator->subtract(), Calculator::SUBTRACT],
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::MULTIPLY] => [$this->calculator->multiply(), Calculator::MULTIPLY],
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::DIVIDE] => [$this->calculator->divide(), Calculator::DIVIDE],
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::FACTORIAL] => [$this->calculator->factorial(), Calculator::FACTORIAL],
            Calculator::MATHEMATICAL_OPERATIONS[Calculator::TO_THE_POWER_OF] => [$this->calculator->toThePowerOf(), Calculator::TO_THE_POWER_OF],
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

$userInput = new UserInput($firstNumber, $secondNumber, $mathematicalOperation);

$userInput->calculateForChosenMathematicalOperation();

