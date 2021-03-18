<?php

namespace Model\Core;
/**
 * Class for database connectivity...
 */
class Adapter
{
	
	function __construct()
	{
		
	}
	private $config = [
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'project'
	];
	private $connect = null;

	//function for established a connection
	public function connection() {
		$connection = new \mysqli($this->config['host'],$this->config['username'],$this->config['password'],$this->config['database']);
		$this->setConnection($connection);
	}

	//function for set connection
	public function setConnection(\mysqli $conn) {
		$this->connect = $conn;
		return $this;
	}

	//function for get connection variable
	public function getConnection() {
		return $this->connect;
	}

	//function for check connection is established or not
	public function isConnected() {
		if(!$this->getConnection()) {
			return false;
		}
		return true;
	}

	//function for insert a record
	public function insert($query) {
		if(!$this->isConnected()) {
			$this->connection();
		}
		if(!$this->connect->query($query)) {
			return false;
		}
		return $this->connect->insert_id;
	}

	//function for update a record
	public function update($query) {
		if(!$this->isConnected()) {
			$this->connection();
		}
		if (!$this->connect->query($query)) {
			return false;
		}
		return true;
	}

	//function for delete a record
	public function delete($query) {
		if(!$this->isConnected()) {
			$this->connection();
		}
		if (!$this->connect->query($query)) {
			return false;
		}
		return true;
	}

	//function for fetch one Row
	public function fetchRow($query) {
		if(!$this->isConnected()){
			$this->connection();
		}
		if (! $data = $this->connect->query($query)) {
			return false;
		}
		if ($result = $data->fetch_assoc()) {
			return $result;
		}

	}

	//function for fetch all record
	public function fetchAll($query) {
		if(!$this->isConnected()){
			$this->connection();
		}
		if (! $data = $this->connect->query($query)) {
			return false;
		}
		if ($result = $data->fetch_all(MYSQLI_ASSOC)) {
			return $result;
		}		
	}

	//fatch data in pair
	public function fetchPairs($query) {
		if(!$this->isConnected()){
			$this->connection();
		}
		if (! $data = $this->connect->query($query)) {
			return false;
		}
		if ($result = $data->fetch_all()) {
			$id = array_column($result,'0');
			$name = array_column($result,'1');
			return array_combine($id,$name);
		}
				
	}
	//for all Query
	public function query($query)
	{
		if (!$this->isConnected()) {
			$this->connection();
		}
		$this->connect->query($query);
	}
}

?>