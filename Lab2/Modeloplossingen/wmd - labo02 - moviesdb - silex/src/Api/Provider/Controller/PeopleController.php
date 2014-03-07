<?php

namespace Api\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

class PeopleController implements ControllerProviderInterface {

	public function connect(Application $app) {

		$controllers = $app['controllers_factory'];

		// Bind sub-routes
		$controllers->get('/', array($this, 'overview'))->bind('people.overview');
		$controllers->get('/{id}', array($this, 'detail'))->assert('$id', '\d+')->bind('people.detail');
		$controllers->get('/{id}/movies', array($this, 'movies'))->assert('$id', '\d+')->bind('people.movies');

		return $controllers;

	}

	public function overview(Application $app) {
		$app['response']->setStatusCode(501);
		$app['response']->setContent('Please provide a person id, e.g. ' . $app['url_generator']->generate('people.detail', array('id' => 123)));
		return $app['response'];
	}

	public function detail(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function movies(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

}