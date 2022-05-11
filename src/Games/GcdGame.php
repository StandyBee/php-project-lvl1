<?php

namespace Project\Games\gcd;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_TASK = 'Find the greatest common divisor of given numbers.';

function runGame()
{
    $correctAnswer = [];
    $question = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 99);
        $num2 = rand(0, 99);
        $question[] = "{$num} {$num2}";
        $result = findGcd($num, $num2);
        $correctAnswer[] = $result;
    }
    $pairQuestionAnswer = ['question' => $question, 'answer' => $correctAnswer];
    return startGame(GAME_TASK, $pairQuestionAnswer);
}

function findGcd(int $num, int $num2)
{
    if ($num == 0 || $num2 == 0) {
        return abs(max(abs($num), abs($num2)));
    }
    $result = $num % $num2;
    return ($result != 0) ? findGcd($num2, $result) : abs($num2);
}
