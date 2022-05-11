<?php

namespace Project\Games\progression;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_TASK = 'What number is missing in the progression?';

function runGame()
{
    $correctAnswer = [];
    $question = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $progression = makeProgression();
        $numbers = implode(' ', $progression);
        $randProgression = array_rand($progression);
        $valueRand = $progression[$randProgression];
        $numberProgression = str_replace([$valueRand], '..', $numbers);
        $question[] = $numberProgression;
        $correctAnswer[] = $valueRand;
    }
    $pairQuestionAnswer = ['question' => $question, 'answer' => $correctAnswer];
    return startGame(GAME_TASK, $pairQuestionAnswer);
}

function makeProgression()
{
    $result = [];
    $firstItem = rand(0, 20);
    $progressionStep = rand(1, 10);
    $secondItem = $firstItem + $progressionStep;
    $count = 0;
    $arrayLength = rand(5, 10);
    for ($i = 0; $i < $arrayLength; $i++) {
        $result[$i] = $count + $secondItem;
        $count += $progressionStep;
    }
    return $result;
}
