<?php

namespace Bramus\Http;

class Request {

	/**
	 * $_PUT does not exist, we'll need to fake it
	 * @var mixed
	 */
	static $_PUT;


	/**
	 * Retrieve the desired $_GET value
	 *
	 * @return	mixed
	 * @param	string $field
	 * @param	mixed[optional] $defaultValue
	 * @param	bool[optional] $checkForEmptyValue
	 */
	public function getValue($field, $defaultValue = null, $checkForEmptyValue = true) {

		// redefine field
		$field = (string) $field;

		// not set, or set but empty? return the default value!
		if (!isset($_GET[$field]) || ($checkForEmptyValue && ((string) $_GET[$field]) === '')) return $defaultValue;

		// it is set: return it
		return $_GET[$field];

	}


	/**
	 * Retrieve the desired $_POST value
	 *
	 * @return	mixed
	 * @param	string $field
	 * @param	mixed[optional] $defaultValue
	 * @param	bool[optional] $checkForEmptyValue
	 */
	public function postValue($field, $defaultValue = null, $checkForEmptyValue = true) {

		// redefine field
		$field = (string) $field;

		// not set, or set but empty? return the default value!
		if (!isset($_POST[$field]) || ($checkForEmptyValue && ((string) $_POST[$field]) === '')) return $defaultValue;

		// it is set: return it
		return $_POST[$field];

	}


	/**
	 * Retrieve the desired $_PUT value
	 *
	 * @return	mixed
	 * @param	string $field
	 * @param	mixed[optional] $defaultValue
	 * @param	bool[optional] $checkForEmptyValue
	 */
	public function putValue($field, $defaultValue = null, $checkForEmptyValue = true) {

		// $_PUT does not exist, we'll need to fake it
		$_PUT = array();

		// No $_PUT stored yet, fetch it and store it for future reference
		if (!isset(self::$_PUT)) {
			parse_str(file_get_contents('php://input'), $_PUT);
			self::$_PUT = $_PUT;
		}
		// $_PUT already stored on class, use that
		else {
			$_PUT = self::$_PUT;
		}

		// redefine field
		$field = (string) $field;

		// not set, or set but empty? return the default value!
		if (!isset($_PUT[$field]) || ($checkForEmptyValue && ((string) $_PUT[$field]) === '')) return $defaultValue;

		// it is set: return it
		return $_PUT[$field];

	}


	/**
	 * Get the IP Address of the one making the request
	 * @return string The IP
	 */
	public function getIP() {
		return $_SERVER['REMOTE_ADDR'];
	}


	/**
	 * Get the method used
	 * @return string The Method
	 */
	public function getMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}


}

// EOF