<?php


function validateRequestPayload( $requestPayload , $requestMethod ) {
	
switch($requestMethod)
  {
	case 'get':
		$this->getValidation( $requestPayload );
		break;
	case 'put':
		$this->putValidation( $requestPayload );
		break;
	case 'post':
		$this->postValidation( $requestPayload );
		break;
	case 'delete':
		$this->deleteValidation( $requestPayload );
		break;	
  }
  	
}


?>