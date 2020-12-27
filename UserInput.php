<?php

declare (strict_types=1);

include ('Calculator.php');

class UserInput
{
    public Calculator $calculator;

    public function __construct(int $firstNumber, int $secondNumber)
    {
        $this->calculator = new Calculator($firstNumber, $secondNumber);
    }

    public function printResult(float|string $result, string $mathematicalOperation): void
    {
        if (gettype($result) === Calculator::DOUBLE_TYPE) {
            echo 'Result of '. $mathematicalOperation . ' of numbers: ' . $this->calculator->getFirstNumber()
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
}

echo 'Enter, a first number: ';
$firstNumber = (int)readline();
echo 'Enter, a second number: ';
$secondNumber = (int)readline();

$userInput = new UserInput($firstNumber, $secondNumber);

$userInput->calculateAll();

$userInput->calculator->setFirstNumber(15);
$userInput->calculator->setSecondNumber(-5);

$userInput->printResult($userInput->calculator->add(), Calculator::ADD);
