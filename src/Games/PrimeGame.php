<?php

namespace Project\Games\prime;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is prime, otherwise answer "no".';

function runGame()
{
    $correctAnswers = [];
    $questions = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 199);
        $questions[] = $num;
        $correctAnswers[] = isPrime($num) ? 'yes' : 'no';
    }
    $roundData = ['questions' => $questions, 'answers' => $correctAnswers];
    return startGame(GAME_DESCRIPTION, $roundData);
}

function isPrime(int $num)
{
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
