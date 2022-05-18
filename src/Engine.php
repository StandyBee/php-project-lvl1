<?php

namespace Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
function startGame(string $task, array $roundData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);
    for ($i = 1; $i <= ROUNDS_COUNT; $i++) {
        $questions = $roundData['questions'];
        $correctAnswers = $roundData['answers'];
        line("Question:'{$questions[$i]}'");
        $answer = prompt('Your answer');
        if ($correctAnswers[$i] == $answer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswers[$i]}'");
            line("Let's try again, $name!");
            return;
        }
    }
    line("Congratulations, $name!");
}
