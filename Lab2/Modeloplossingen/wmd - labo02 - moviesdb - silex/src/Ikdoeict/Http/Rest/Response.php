<?php
/**
 * @author		Bramus Van Damme <bramus@bram.us>
 * @copyright	Copyright (c), 2014 Bramus Van Damme
 * @license 	GNU General Public License 3 (http://www.gnu.org/licenses/)
 *		   	    Refer to the LICENSE file distributed within the package.
 */

namespace Ikdoeict\Http\Rest;

class Response extends \Symfony\Component\HttpFoundation\Response {


	/**
	 * Constructor.
	 *
	 * @param mixed   $content The response content, see setContent()
	 * @param integer $status  The response status code
	 * @param array   $headers An array of response headers
	 *
	 * @throws \InvalidArgumentException When the HTTP status code is not valid
	 *
	 * @api
	 */
	public function __construct($content = '', $status = 200, $headers = array()) {

		// Call Parent Constructor and set Content-Type to application/json
		parent::__construct($content, $status, array('Content-type' => 'application/json'));
	}


	/**
	 * Sends content for the current web response.
	 *
	 * @return Response
	 */
	public function sendContent() {

		// Echo the content in the format we want
		echo json_encode(
			array(
				'status' => array(
					'code' => $this->statusCode,
					'text' => $this->statusText
				),
				'content' => $this->content
			), JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK
		);

		return $this;
	}


	/**
	 * Sets the response content.
	 *
	 * Valid types are strings, numbers, null, and objects that implement a __toString() method.
	 *
	 * @param mixed $content Content
	 *
	 * @return Response
	 *
	 * @api
	 */
	public function setContent($content) {

		// Accept anything as content, and surely don't cast to string!
		$this->content = $content;
		return $this;

	}

}