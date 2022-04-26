#!/usr/bin/php
<?php

function game()
{
	        global $name;
		        $num = rand(0,99);
		        line("Question: %s", $num);
			        $answer = prompt('Your answer: ');

			        if ($num % 2 === 0 && $answer === 'yes') {
					                line('Correct!');
							                return true;
							        } elseif ($num % 2 !== 0 && $answer === 'no') {
									                line('Correct!');
											                return true;
											        } elseif ($num % 2 === 0 && $answer !== 'yes') {
													                line("'%s' is wrong answer ;(. Correct answer was 'yes'", $answer);
															                line("Let's try again, %s!", $name);
															                return false;
																	        } elseif ($num % 2 !== 0 && $answer !== 'no') {
																			                line ("'%s' is wrong answer ;(. Correct answer was 'no'", $answer);
																					                line("Let's try again, %s!", $name);
																					                return false;
																							        }
}
