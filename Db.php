<?php 

class Db {
	// The database connection
	protected static $conn;
	
	/**
	 * Connect to the database
	 * 
	 * @return bool false on failure / mysqli MySQLi object instance on success
	 */
	public function connect() {
		
		// Try and connect to the database
		if(!isset(self::$conn)) {
			// Load configuration as an array. Use the actual location of your configuration file
			// Put the configuration file outside of the document root
			   
    // create a database connection, using the constants from config/db.php (which we loaded in above)
                     
			self::$conn = $conn = new mysqli(DB_HOST1, DB_USER1, DB_PASS1, DB_NAME1);
		}
	
		// If connection was not successful, handle the error
		if(self::$conn === false) {
			// Handle error - notify administrator, log to a file, show an error screen, etc.
			return false;
		}
		return self::$conn;
	}
	
	/**
	 * Query the database
	 *
	 * @param $query The query string
	 * @return mixed The result of the mysqli::query() function
	 */
	public function query($query) {
		// Connect to the database
		$conn = $this -> connect();
		
		// Query the database
		$result = $conn -> query($query);
		
		return $result;
	}
	
	/**
	 * Fetch rows from the database (SELECT query)
	 *
	 * @param $query The query string
	 * @return bool False on failure / array Database rows on success
	 */
	public function select($query) {
		$rows = array();
		$result = $this -> query($query);
		if($result === false) {
			return false;
		}
		while ($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	/**
	 * Fetch the last error from the database
	 * 
	 * @return string Database error message
	 */
	public function error() {
		$conn = $this -> connect();
		return $conn -> error;
	}
	
	/**
	 * Quote and escape value for use in a database query
	 *
	 * @param string $value The value to be quoted and escaped
	 * @return string The quoted and escaped string
	 */
	public function quote($value) {
		$conn = $this -> connect();
		return "'" . $conn -> real_escape_string($value) . "'";
	}
}
