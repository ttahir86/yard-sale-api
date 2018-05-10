<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once('businessClass.php');


$app->get('/api/business', function() {
	$business = new Business();
	// THIS SHOULD BE A PUBLIC STATIC METHOD.
	$allBusinesses = $business->getAllBusiness();
	echo $allBusinesses;
});




/*
	@type:		POST
	@params: 	business_name 		
	@params:	email_address
	@params: 	password
	@return: 	message indicating success or failure upon enrollment
*/
$app->post('/api/addbusiness', function(Request $request, Response $response) {

	// get params from request
	$business_name 	= $request->getParam('business_name') 	== null || 	$request->getParam('business_name') 	== "" 	? null : $request->getParam('business_name');
	$email_address 	= $request->getParam('email_address') 	== null || 	$request->getParam('email_address') 	== "" 	? null : $request->getParam('email_address');
	$password 		= $request->getParam('password') 		== null || 	$request->getParam('password') 			== "" 	? null : $request->getParam('password');
	
	// create array with business information 
	$businessInfo = array(
		"business_name" => $business_name,
		"email_address" => $email_address,
		"password"		=> $password
	);
	
	// create new business
	$newBusiness = _addNewBusiness($businessInfo);
	
	// return response
	$message = $newBusiness: "BUSINESS CREATED SUCCESFFULLY <BR>" ? "FAILURE - BUSINESS COULD NOT BE CREATED.";
	
	// need proper response for cross-orign request.
	echo message;
});

protected function _addNewBusiness($businessInfo){
	$newBusiness = new Business();
	$newBusiness->setBusinessName($businessInfo['business_name']);
	$newBusiness->setEmailAddress($businessInfo['email_address']);
	$newBusiness->setPassword($businessInfo['password']);
	$newBusiness->createBusiness();
	return $newBusiness;
}

?>