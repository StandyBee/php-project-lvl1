<?php

namespace Project\Games\calc;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function runGame()
{
    $correctAnswers = [];
    $questions = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $signs = ['+', '-', '*'];
        $randomSign = $signs[array_rand($signs)];
        $num = rand(0, 99);
        $num2 = rand(0, 99);
        $questions[] = "{$num} {$randomSign} {$num2}";
        $correctAnswers[] = calculate($num, $num2, $randomSign);
    }
    $roundData = ['questions' => $questions, 'answers' => $correctAnswers];
    return startGame(GAME_DESCRIPTION, $roundData);
}

function calculate(int $num, int $num2, string $randomSign)
{
    switch ($randomSign) {
        case "+":
            return $num + $num2;
        case "-":
            return $num - $num2;
        case "*":
            return $num * $num2;
        default:
            return "Incorrect sign: '{$randomSign}'";
    }
}
