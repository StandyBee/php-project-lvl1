<?php

namespace Project\Games\even;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function runGame()
{
    $correctAnswers = [];
    $questions = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 99);
        $questions[] = $num;
        $correctAnswers[] = isEven($num) ? 'yes' : 'no';
    }
    $roundData = ['questions' => $questions, 'answers' => $correctAnswers];
    return startGame(GAME_DESCRIPTION, $roundData);
}

function isEven(int $num)
{
    return $num % 2 === 0;
}
