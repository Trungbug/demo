<?php
require_once('config.php');

class DBHelper
{
	// Mo ket noi voi sql
	private static function open()
	{
		$conn = new mysqli(HOST_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
		$conn->set_charset('utf8');
		if ($conn->connect_error) {
			echo "Failed to connect to MySQL: " . $conn->connect_error;
			exit();
		}
		return $conn;
	}

	private static function close($conn)
	{
		if ($conn != null) {
			$conn->close();
		}
	}

	/**
	 * Su dung cho lenh: insert/update/delete
	 */

	public static function execute($sql)
	{
		// Them du lieu vao database
		//B1. Mo ket noi toi database
		$conn = DBHelper::open();

		//B2. Thuc hien truy van insert
		if ($conn != null) {
			$result = $conn->query($sql);
			return $result;
		}

		//B3. Dong ket noi database
		DBHelper::close($conn);
		return false;
	}

	/**
	 * Su dung cho lenh: select
	 */
	public static function executeResult($sql)
	{
		// Them du lieu vao database
		//B1. Mo ket noi toi database
		$conn = DBHelper::open();

		//B2. Thuc hien truy van insert
		$resultset = $conn->query($sql);

		//B3. Dong ket noi database
		DBHelper::close($conn);
		return $resultset;
	}
}
?>