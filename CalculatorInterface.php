<?php

declare (strict_types=1);

interface CalculatorInterface
{
    public function getFirstNumber(): float;

    public function getSecondNumber(): float;

    public function add(): float;

    public function subtract(): float;

    public function multiply(): float;

    public function divide(): float|string;

    public function factorial(): float;

    public function toThePowerOf(): float|string;

    public function getMathematicalOperations(): array;
}