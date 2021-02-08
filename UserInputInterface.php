<?php

declare(strict_types=1);

interface UserInputInterface
{
    public function calculateAll(): void;

    public function calculateForChosenMathematicalOperation(): void;
}