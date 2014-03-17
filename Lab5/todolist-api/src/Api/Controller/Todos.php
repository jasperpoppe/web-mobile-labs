<?php

namespace Api\Controller;

class Todos {


	/**
	 * Constructor
	 * @param \Pimple $dic Dependency Injection Container (to be used a Service Locator)
	 */
	public function __construct($dic) {
		$this->dic = $dic;
		$this->repo = new \Api\Repository\Todos($dic['db']);
	}


	/**
	 * Get a list of all todos
	 * @return \Bramus\Http\RestResponse
	 */
	public function overview() {

		$todos = $this->repo->fetchAll();

		foreach($todos as &$todo) {

			// inject links
			$todo['links'] = array(
				array('rel' => 'self', 'href' => '/todos/' . $todo['id']),
			);

		}

		$this->dic['response']->setContent($todos);

		// Return the response
		return $this->dic['response'];

	}


	/**
	 * Insert a new todo
	 * @return \Bramus\Http\RestResponse
	 */
	public function insert() {

		// Get necessary data from $_POST
		$data = array(
			'what' => $this->dic['request']->postValue('what', ''),
			'priority' => $this->dic['request']->postValue('priority'),
			'added_on' => (new \DateTime())->format('Y-m-d H:i:s')
		);

		// We have form errors
		if ((trim($data['what']) == '') || (!in_array($data['priority'], array('high','low','normal')))) {
			$this->dic['response']->setStatusCode(400);
			$this->dic['response']->setContent('Some of the required POST arguments are missing or do not match the minimum requirements');
		}

		// We don't have errors
		else {

			$data['id'] = $this->repo->insert($data);

			if ($data['id']) {
				$this->dic['response']->setStatusCode(201);
				$this->dic['response']->setContent($data);
			} else {
				$this->dic['response']->setStatusCode(500);
				$this->dic['response']->setContent('Error while inserting');
			}
		}

		// return response
		return $this->dic['response'];

	}


	/**
	 * Get one single todo
	 * @param  int $id ID of the todo
	 * @return \Bramus\Http\RestResponse
	 */
	public function detail($id) {

		// Get todo from DB
		$todo = $this->repo->fetchAssoc($id);

		// No todo found
		if (!$todo) {
			$this->dic['response']->setStatusCode(404);
			$this->dic['response']->setContent('Invalid todo ID');
		}

		// todo found
		else {

			// inject links
			$todo['links'] = array(
				array('rel' => 'root', 'href' => '/'),
				array('rel' => 'index', 'href' => '/todos'),
				array('rel' => 'self', 'href' => '/todos/' . $todo['id']),
			);

			$this->dic['response']->setContent($todo);

		}

		// Return the response
		return $this->dic['response'];

	}


	/**
	 * Update a todo
	 * @param  int $id ID of the todo
	 * @return \Bramus\Http\RestResponse
	 */
	public function update($id) {

		// Get todo from DB
		$todo = $this->repo->fetchAssoc($id);

		// No todo found
		if (!$todo) {
			$this->dic['response']->setStatusCode(404);
			$this->dic['response']->setContent('Invalid todo ID');
		}

		// todo found
		else {

			// Get necessary data from $_POST/$_PUT depending on method used
			if ($this->dic['request']->getMethod() == 'POST') {
				$data = array(
					'what' => $this->dic['request']->postValue('what', ''),
					'priority' => $this->dic['request']->postValue('priority')
				);
			} else {
				$data = array(
					'what' => $this->dic['request']->putValue('what', ''),
					'priority' => $this->dic['request']->putValue('priority')
				);
			}

			// We have form errors
			if ((trim($data['what']) == '') || (!in_array($data['priority'], array('high','low','normal')))) {
				$this->dic['response']->setStatusCode(400);
				$this->dic['response']->setContent('Some of the required POST arguments are missing or do not match the minimum requirements');
			}

			// We don't have errors
			else {

				$this->repo->update($data, array('id' => $id));

				$this->dic['response']->setStatusCode(200);
				$this->dic['response']->setContent($data);

			}

		}

		// return response
		return $this->dic['response'];

	}


	/**
	 * Delete a todo
	 * @param  int $id ID of the todo
	 * @return \Bramus\Http\RestResponse
	 */
	public function delete($id) {

		// Get todo
		$todo = $this->repo->fetchAssoc($id);

		// Todo does not exist
		if (!$todo) {

			$this->dic['response']->setStatusCode(404);
			$this->dic['response']->setContent('Invalid Todo ID');

		}

		// Todo exists
		else {

			$this->repo->delete(array('id' => $id));

			$this->dic['response']->setStatusCode(204); // Note that the content won't be sent now ...
			$this->dic['response']->setContent('');

		}

		// return response
		return $this->dic['response'];

	}

}