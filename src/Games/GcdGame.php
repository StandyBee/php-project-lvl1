<?php

namespace Project\Games\gcd;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function runGame()
{
    $correctAnswers = [];
    $questions = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 99);
        $num2 = rand(0, 99);
        $questions[] = "{$num} {$num2}";
        $result = findGcd($num, $num2);
        $correctAnswers[] = $result;
    }
    $roundData = ['questions' => $questions, 'answers' => $correctAnswers];
    return startGame(GAME_DESCRIPTION, $roundData);
}

function findGcd(int $num, int $num2)
{
    if ($num == 0 || $num2 == 0) {
        return abs(max(abs($num), abs($num2)));
    }
    $result = $num % $num2;
    return ($result != 0) ? findGcd($num2, $result) : abs($num2);
}
