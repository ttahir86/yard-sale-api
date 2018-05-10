<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$app->get('/api/business', function() {
	
	// require_once(__DIR__.'/../../database/SQLQuery.php');
	echo "business";
	require_once('businessClass.php');

	$business = new Business;

	$allBusinesses = $business->getAllBusiness();
	echo $allBusinesses;


	// $query = "select * from businessname";
	// $result = $conn->prepare($query);
	// $result->execute();

	// foreach ($result as $row) {
	// 	$data[] = $row;
	// 	// print_r($row);
	// }

	// if (isset($data)) {
	// 	header('Content-Type: application/json');
	// 	echo json_encode($data);
	// }


});



$app->post('/api/addbusiness', function() {

	require_once('businessClass.php');

	$newBusiness = new Business();
	$aBusinessInfo = $_POST['aInfo'];

	$business_name = $aBusinessInfo['business_name'];
	$email_address = $aBusinessInfo['email_address'];
	$password	   = $aBusinessInfo['password'];

	$newBusiness->setBusinessName($business_name);
	$newBusiness->setEmailAddress($email_address);
	$newBusiness->setPassword($password);

	echo "***BUSIENESS PHP WITH POST DATA"."<BR>";
	var_dump($newBusiness);
	echo "<BR>";


	$newBusiness->createBusiness();


});


?>