<?php  
ini_set('display_errors', 'On');
error_reporting(E_ALL);
// define("MY_DIR", "C:\xampp\htdocs\myslimsite");
/**
* BusinessClass
*/
class Business {

	public $businessName = "";
	public $emailAddress = "";
	public $password = "";


	public function setBusinessName($propertyValue) {
		$this->businessName = $propertyValue;
	}

	public function setEmailAddress($propertyValue) {
		$this->emailAddress = $propertyValue;
	}

	public function setPassword($propertyValue) {
		$this->password = $propertyValue;
	}

	public function getProperty($propertyName) {
		return $this->$propertyName;
	}


	public function createBusiness() {

		// echo "updateBusiness"."<BR>";
		// echo __DIR__."<BR>";

		require_once(__DIR__.'/../../database/SQLQuery.php');

		$queryObj = new SQLQuery;

		$queryObj->setTable("businessname");
		$queryObj->setInsertColumns("BusinessName, EmailAddress, Password");
		$queryObj->setInsertValues("'$this->businessName','$this->emailAddress','$this->password'");

		echo "BUSINESS CLASS WITH DATA FROM BUSINESS CLASS"."<BR>";
		var_dump($queryObj)."<BR>";
		echo "<BR>";

		$queryObj->insertRow();


	}


	public function getAllBusiness() {

		echo "get all business";

		require_once(__DIR__.'/../../database/SQLQuery.php');

		$queryObj = new SQLQuery;
		$queryObj->setTable("businessname");

		$allBusinesses = $queryObj->getTableData();


	}


}


// $object = new BusinessClass;
// var_dump($object);

?>