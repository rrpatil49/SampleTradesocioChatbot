<?php 
$method = $_SERVER['REQUEST_METHOD'];

$text_temp = $_REQUEST['text_temp'];
function explodeKeyword($text)
{
	if (strpos($text, 'balance') !== false)
	{
		$getTxtArray = explode("==TSTEXT",$text);
		$getBalanceArray = explode("::",$getTxtArray[1]);
		 
		if(in_array("profileID",$getBalanceArray)) 
		{
			$profileID = $getBalanceArray[2];
		}
		if(in_array("AccountID",$getBalanceArray)) 
		{
			$AccountID = $getBalanceArray[count($getBalanceArray)-1];
			//echo count($getBalanceArray);
			//echo "<pre>";print_r($getBalanceArray);
		}
		
		$keyword  = "balance";
		if($profileID ) $output=" Balance of your Profile # ".$profileID ." is $ 1020 ";
		if($AccountID) $output=" Balance of your account # ".$AccountID ." is $ 1020 ";
		
		try
		{
			$ch = curl_init();
			if (FALSE === $ch){
			throw new Exception('failed to initialize');
		}
		$domain = "http://demosite3.fxsocio.com/";
		//$domain = "http://new.fxsocio.com/";
		curl_setopt($ch, CURLOPT_URL,$domain."webservices_new/getbalance.php?profileID=$profileID&AccountID=".$AccountID);
		curl_setopt($ch, CURLOPT_POST, TRUE);
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$p_result = curl_exec($ch);
		return $p_result;
		exit();
		if (FALSE === $p_result) {
		throw new Exception(curl_error(), curl_errno());
		curl_close($ch);
		} else{
		curl_close($ch);
		return $p_result;
		}
		}catch(Exception $e) {
		trigger_error(sprintf('Curl failed with error #%d: %s',$e->getCode(),
		$e->getMessage()),E_USER_ERROR); 
		return $output ; 
		}
		
	}
}

//STARTED ADDED FOR TESTING PURPOSE 
if($text_temp !="")
{
	if (strpos($text_temp, 'balance') !== false)
	{
		echo explodeKeyword($text_temp) ; 
		die;
	}
}

	
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->queryText;
	$keyword  = $text;
	if(strstr($text,"balance"))
	{
		 $keyword  = "balance";
	}
	
	switch ($keyword) 
	{
		case 'balance':
		$check->fulfillmentText = explodeKeyword($text) ;
			//$check->displayText = "Hi, Nice to meet you";
			//$check->source = "webhook-echo-sample";
			break;
	
		case 'hi':
		$check->fulfillmentText = "Hi, Its a worderful day , welcome to the Tradesocio ";
			//$check->displayText = "Hi, Nice to meet you";
			//$check->source = "webhook-echo-sample";
			break;
		
		case 'bye-bye':
		$check->fulfillmentText = "Hi...... bye bye";
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
			break;

		case 'anything':
		$check->fulfillmentText = "Hi, Nice to meet you anything anything";
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
			break;
		case 'thanx':
		$check->fulfillmentText = "You are welcome.";
			//$check->displayText = "Hi, Nice to meet you";
			//$check->source = "webhook-echo-sample";
			break;
		case 'thank you':
		$check->fulfillmentText = "You are welcome.";
			//$check->displayText = "Hi, Nice to meet you";
			//$check->source = "webhook-echo-sample";
			break;
		default:
		$check->fulfillmentText = "Sorry I did not get that...!!";
		//$check->displayText = "Hi, Nice to meet you";
		//$check->source = "webhook-echo-sample";
			break;
	}
 
	echo json_encode($check);
}
else
{
	echo "Method not alloweddddd";
}

?>
