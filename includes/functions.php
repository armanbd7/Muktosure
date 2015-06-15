<?php
	function get_answer($find){
		$quesans=array(
		"Hello! How are you?"=>"I am fine.Thank you.",
		"Hi! What is your name?"=>"My name is arman",
		"Good morning! I am Kitty! nice to meet you!"=>"Good morning! nice to meet you too...."
		);
		foreach($quesans as $question=>$answer){
			if($question==$find){
				return $answer;
				break;
			}
		}
	}
?>