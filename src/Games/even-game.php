<?php

namespace Project\Games\even;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_TASK = ('Answer "yes" if the number is even, otherwise answer "no".');
function runGame()
{
    $correctAnswer = [];
    $question = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $num = rand(0, 99);
        $question[] = $num;
        $correctAnswer[] = isEven($num) ? 'yes' : 'no';
    }
    $pairQuestionAnswer = ['question' => $question, 'answer' => $correctAnswer];
    return (startGame(GAME_TASK, $pairQuestionAnswer));
}

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return true;
    }
        return false;
}
