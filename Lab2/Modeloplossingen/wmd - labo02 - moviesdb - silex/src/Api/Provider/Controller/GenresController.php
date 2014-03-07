<?php

namespace Api\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

use Symfony\Component\Validator\Constraints as Assert;

class GenresController implements ControllerProviderInterface {

	public function connect(Application $app) {

		$controllers = $app['controllers_factory'];

		// Bind sub-routes
		$controllers->get('/', array($this, 'overview'))->bind('genres.overview');
		$controllers->post('/', array($this, 'insert'))->bind('genres.insert');
		$controllers->get('/{id}', array($this, 'detail'))->assert('$id', '\d+')->bind('genres.detail');
		$controllers->put('/{id}', array($this, 'update'))->assert('$id', '\d+')->bind('genres.update');
		$controllers->delete('/{id}', array($this, 'delete'))->assert('$id', '\d+')->bind('genres.delete');
		$controllers->get('/{id}/movies', array($this, 'movies'))->assert('$id', '\d+')->bind('genres.movies');

		return $controllers;

	}

	public function overview(Application $app) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function insert(Application $app) {

		// Get necessary data from $_POST
		$data = array(
			'title' => $app['request']->request->get('title')
		);

		// Validations
		$constraints = new Assert\Collection(array(
			'title' => array(
				new Assert\NotBlank(),
				new Assert\Length(array('min' => 4))
			)
		));

		// Check it!
		$errors = $app['validator']->validateValue($data, $constraints);

		// We have errors
		if (count($errors) > 0) {
			$app['response']->setStatusCode(400);
			$app['response']->setContent('Some of the required POST arguments are missing or do not match the minimum requirements');
		}

		// We don't have errors
		else {

			// @TODO: actually perform the insert here

			$app['response']->setStatusCode(201);
			$app['response']->setContent(array(
				'id' => 666,
				'note' => 'This is method only fake inserts as a proof of concept, no actual data was inserted',
				'links' => array(
					array('rel' => 'self', 'href' => $app['url_generator']->generate('genres.detail', array('id' => 666))),
				)
			) + $data);
		}

		// return response
		return $app['response'];

	}

	public function detail(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function update(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function delete(Application $app, $id) {

		// Get genre
		$genre = $app['db.genres']->find($id);

		// Genre does not exist
		if (!$genre) {

			$app['response']->setStatusCode(404);
			$app['response']->setContent('Invalid Genre ID');

		}

		// Genre exists
		else {

			// @TODO: actually perform the deletion here

			$app['response']->setStatusCode(204); // Note that the content won't be sent now ...
			$app['response']->setContent(array(
				'id' => $id,
				'affectedrows' => 1,
				'note' => 'This is method only fake deletes as a proof of concept, no actual data was deleted',
				'links' => array(
					array('rel' => 'index', 'href' => $app['url_generator']->generate('genres.overview')),
				)
			));

		}

		// return response
		return $app['response'];

	}

	public function movies(Application $app, $id) {
		// @TODO
	}

}