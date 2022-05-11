<?php

namespace Project\Games\calc;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_TASK = 'What is the result of the expression?';

function runGame()
{
    $correctAnswer = [];
    $question = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $sign = ['+', '-', '*'];
        $randomSign = $sign[array_rand($sign)];
        $num = rand(0, 99);
        $num2 = rand(0, 99);
        $question[] = "{$num} {$randomSign} {$num2}";
        $correctAnswer[] = calculate($num, $num2, $randomSign);
    }
    $pairQuestionAnswer = ['question' => $question, 'answer' => $correctAnswer];
    return startGame(GAME_TASK, $pairQuestionAnswer);
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
    }
}
