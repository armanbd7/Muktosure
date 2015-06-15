<?php
	include("../includes/functions.php");
	header("Content-Type:application/json");
	


	if(!empty($_GET['q'])){
		$question=urldecode($_GET['q']);
		$answer=get_answer($question);
		if(empty($answer)){
		deliver_response(200,"Answer is  not found",NULL);
		}
		else{
			deliver_response(200,"Answer found",$answer);
		}
	}
	else{
		deliver_response(200,"invalid request",null);

	
		
	}
	
	function deliver_response($status_code,$status_message,$answer){
		header("HTTP/1.1 $status_code $status_message");
		$response['status_code']=$status_code;
		$response['status_message']=$status_message;
		$response['answer']=$answer;
		$json_response=json_encode($response);
		echo $json_response;
	}
?>

