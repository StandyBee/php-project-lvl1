<?php

namespace Project\Games\progression;

use function Project\Engine\startGame;

use const Project\Engine\ROUNDS_COUNT;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function runGame()
{
    $correctAnswers = [];
    $questions = [];
    for ($i = 0; $i <= ROUNDS_COUNT; $i++) {
        $progression = makeProgression();
        $numbers = implode(' ', $progression);
        $randProgression = array_rand($progression);
        $valueRand = $progression[$randProgression];
        $numberProgression = str_replace([$valueRand], '..', $numbers);
        $questions[] = $numberProgression;
        $correctAnswers[] = $valueRand;
    }
    $roundData = ['questions' => $questions, 'answers' => $correctAnswers];
    return startGame(GAME_DESCRIPTION, $roundData);
}

function makeProgression()
{
    $result = [];
    $firstItem = rand(0, 20);
    $progressionStep = rand(1, 10);
    $secondItem = $firstItem + $progressionStep;
    $count = 0;
    $progressionLength = rand(5, 10);
    for ($i = 0; $i < $progressionLength; $i++) {
        $result[$i] = $count + $secondItem;
        $count = $count + $progressionStep;
    }
    return $result;
}
