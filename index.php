<?php 
$method = $_SERVER['REQUEST_METHOD'];

$text_temp = $_REQUEST['text_temp'];

function explodeKeyword($text)
{
	$getTxtArray = explode("==TSTEXT",$text);
	$getBalanceArray = explode("::",$getTxtArray[1]);
	$domain = "http://demosite3.fxsocio.com/getbalance_nilesh.php";
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
	 
	$gettextArray = explode(" ",$text);
	//print_r($gettextArray);
	
	if (strpos($text, 'balance') !== false) {
		$plain = "balance|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=balance&profileID=$profileID&AccountID=".$AccountID ;
	}	
	 
	if (strpos($text, 'equity') !== false){
		$plain = "equity|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=equity&profileID=$profileID&AccountID=".$AccountID ;
	}	
  
	if ( in_array("switch",$gettextArray) && in_array("account",$gettextArray)  ) {
		$plain = "switchaccount|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=switchaccount&profileID=$profileID&AccountID=".$AccountID ;
	}	
	
	if ( in_array("change",$gettextArray) && in_array("account",$gettextArray)  ){
		$plain = "switchaccount|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
	  //$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=switchaccount&profileID=$profileID&AccountID=".$AccountID ;
	}
	
	if (strpos($text, 'allocations') !== false && strpos($text, 'active') !== false){
		$plain = "activeallocations|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=activeallocations&profileID=$profileID&AccountID=".$AccountID;
	}	
	 
	if (strpos($text, 'summary') !== false) {
		$plain = "mysummary|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=mysummary&profileID=$profileID&AccountID=".$AccountID;
	}
  
	if (strpos($text, 'option') !== false) {
		$plain = "setoption|".$profileID."|" .$AccountID. "|" .$text;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?text=".$text."&keyworddetails=setoption&profileID=$profileID&AccountID=".$AccountID;
	}
	
	if (strpos($text, 'open') !== false) {
		$plain = "openposition|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=openposition&profileID=$profileID&AccountID=".$AccountID;
	}	
	
	if (strpos($text, 'close') !== false) {
		$plain = "closedposition|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=closedposition&profileID=$profileID&AccountID=".$AccountID;
	}
	
	if (strpos($text, 'dd') !== false || strpos($text, 'drawdown') !== false){
		$plain = "maxdd|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=maxdd&profileID=$profileID&AccountID=".$AccountID;
	}	
	
	if (strpos($text, 'roi') !== false || strpos($text, 'return') !== false) {
		$plain = "returnofinvestment|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=returnofinvestment&profileID=$profileID&AccountID=".$AccountID;
	}	
	
	if (strpos($text, 'available') !== false && strpos($text, 'invested') !== false){
		$plain = "availableinvested|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=availableinvested&profileID=$profileID&AccountID=".$AccountID;
	}
	
	if (strpos($text, 'total') !== false && strpos($text, 'invested') !== false) {
		$plain = "totalinvested|".$profileID."|" .$AccountID;
		$request = encrypts($plain);
		$post = strtr($request, '+/=', '-_,' );
		$curlURL = $domain."?data=".$post;
		//$curlURL = $domain."webservices_new/getbalance.php?keyworddetails=totalinvested&profileID=$profileID&AccountID=".$AccountID;
	}	
	
	try
	{
		$ch = curl_init();
		if (FALSE === $ch){
		throw new Exception('failed to initialize');
	}
	curl_setopt($ch, CURLOPT_URL,$curlURL );
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
	 
	
	switch ($keyword) 
	{
		 
	
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
		
		default:
		$check->fulfillmentText = explodeKeyword($text) ;
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




# Encrypt a value using AES-256.
function encrypts($plain, $key = null, $hmacSalt = null) {
			
	# Private salt
	$salt = 'ZfTfbip&Gs0Z4yz3ZfTfbip&Gs0Z4yz3';
	# Private key
	$key =  'SDefrfdrghgfdfE)SDefrfdrghgfdfE)';
   
	$time = time();
	$plain = $plain."|".$time;
	$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
	$iv = openssl_random_pseudo_bytes($ivlen);
	$ciphertext_raw = openssl_encrypt($plain, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
	$hmac = hash_hmac('sha256', $ciphertext_raw, $salt, $as_binary=true);
	$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
 
	return  $ciphertext;
}



?>
