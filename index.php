<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->queryText;

	$json->queryResult->fulfillmentMessages->text->text = "Hi, Nice to meet you";
	echo json_encode($json);
	exit;
	switch ($text) {
		case 'hi':
			$json->queryResult->fulfillmentMessages->text->text = "Hi, Nice to meet you";
			break;

		case 'bye':
			$json->queryResult->fulfillmentMessages->text->text = "Bye, good night";
			break;

		case 'anything':
			$json->queryResult->fulfillmentMessages->text->text = "Yes, you can type anything here.";
			break;
		
		default:
			$json->queryResult->fulfillmentMessages->text->text = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
 
	echo json_encode($json);
}
else
{
	echo "Method not alloweddddd";
}

?>

