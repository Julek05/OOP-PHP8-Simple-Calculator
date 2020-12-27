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
}

echo 'Enter, a first number: ';
$firstNumber = (int)readline();
echo 'Enter, a second number: ';
$secondNumber = (int)readline();

$userInput = new UserInput($firstNumber, $secondNumber);

$userInput->calculator->calculateAll();

$userInput->calculator->setFirstNumber(15);
$userInput->calculator->setSecondNumber(-5);

$userInput->calculator->printResult($userInput->calculator->add(), Calculator::ADD);
