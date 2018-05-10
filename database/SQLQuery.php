<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
/**
* SQLQuery
*/
class SQLQuery {

	public $tableName;
	public $columns = "*";
	public $where;
	public $insertCols;
	public $insertVals;

	public function setTable($tableName) {
		$this->tableName = $tableName;
	}

	public function setWhere($where) {
		$this->where = $where;
	}

	// coma separated column names
	public function setInsertColumns($insertCols) {
		$this->insertCols = $insertCols;
	}

	// coma separated column values
	public function setInsertValues($insertVals) {
		$this->insertVals = $insertVals;
	}

	public function insertRow() {

		require_once('DBConnect.php');

		$conObj = new DBH();
		$conn = $conObj->connect();
		echo "SQLQUERY CLASS CONNETION OBJET"."<BR>";
		var_dump($conn)."<BR>";

		$insert = $conn->prepare("INSERT INTO $this->tableName ($this->insertCols) VALUES ($this->insertVals)");
		$insert->execute();

		echo "INSERTED NEW ROW"."<BR>";

	}


	public function getTableData() {

		require_once('DBConnect.php');
		$conObj = new DBH();
		$conn = $conObj->connect();

		$result = $conn->prepare("SELECT $this->columns FROM $this->tableName");
		$result->execute();

		foreach ($result as $row) {
			print_r($row);
		}

		// var_dump($result);

		return $result;


	}




}

?>