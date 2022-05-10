<?php

namespace Project\Games\prime;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_TASK = ('Answer "yes" if the number is prime, otherwise answer "no".');
function runGame()
{
    $correctAnswer = [];
    $question = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 199);
        $question[] = $num;
        $correctAnswer[] = isPrime($num) ? 'yes' : 'no';
    }
    $pairQuestionAnswer = ['question' => $question, 'answer' => $correctAnswer];
    return (startGame(GAME_TASK, $pairQuestionAnswer));
}
function isPrime(int $num)
{
    if ($num == 0) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
