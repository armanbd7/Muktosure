<?php
	
	header("Content-Type:application/json");
	$conn = new mysqli("localhost", "root","", "muktosure");
	if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
	}


	if(!empty($_GET['q'])){
		$question=urldecode($_GET['q']);
		$query="SELECT  `answer` FROM `question` WHERE `question`='{$question}'";
		$result=$conn->query($query);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$answer=$row['answer'];
			}
		}
		
		
		if(empty($answer)){
		deliver_response(200,"Answer is  not found",NULL);
		}
		else{
			deliver_response(200,"Answer found",$answer);
		}
	}
	else{
		deliver_response(200,"invalid request",null);

		$conn->close();
		
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