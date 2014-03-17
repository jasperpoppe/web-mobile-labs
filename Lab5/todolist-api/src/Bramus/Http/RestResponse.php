<?php

/**
 * @author		Bramus Van Damme <bramus@bram.us>
 * @copyright	Copyright (c), 2013 Bramus Van Damme
 */


namespace Bramus\Http;


class RestResponse extends Response  {


	/**
	 * Display it all :-)
	 * @return void
	 */
	public function finish($jsonp = null) {

		// build JSON string to return
		$json = json_encode(
			array(
				'status' => $this->status,
				'content' => $this->content
			), JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK
		);

		// Don't Cache
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

		// jsonp
		if ($jsonp) {
			header('Content-type: application/javascript');
			echo $jsonp . '(' . $json . ');';
		}

		// json
		else {
			header('Content-type: application/json');
			echo $json;
		}

		exit();

	}

}

// EOF