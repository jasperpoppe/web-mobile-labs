<?php

namespace Api\Provider\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

class MoviesController implements ControllerProviderInterface {

	public function connect(Application $app) {

		$controllers = $app['controllers_factory'];

		// Bind sub-routes
		$controllers->get('/', array($this, 'overview'))->bind('movies.overview');
		$controllers->post('/', array($this, 'insert'))->bind('movies.insert');
		$controllers->get('/{id}', array($this, 'detail'))->assert('$id', '\d+')->bind('movies.detail');
		$controllers->put('/{id}', array($this, 'update'))->assert('$id', '\d+')->bind('movies.update');
		$controllers->delete('/{id}', array($this, 'delete'))->assert('$id', '\d+')->bind('movies.delete');
		$controllers->get('/{id}/photos', array($this, 'photos'))->assert('$id', '\d+')->bind('movies.photos');

		return $controllers;

	}

	public function overview(Application $app) {

		$movies = $app['db.movies']->findAll();
		// $genres = $app['db.genres']->findAll();

		foreach($movies as &$movie) {

			// inject plain description
			$movie['description_plain'] = strip_tags(str_replace('<br />', PHP_EOL, $movie['description']));

			// inject covers
			$movie['cover_big'] = '/' . $app['paths']['movies']['covers_big'] . '/' . $movie['id'] . '.jpg';
			$movie['cover_small'] = '/' . $app['paths']['movies']['covers_small'] . '/' . $movie['id'] . '.jpg';

			// inject genres with links
			$movie['genres'] = array();
			$genres = $app['db.movies']->getGenres($movie['id']);
			foreach($genres as $genre) {
				$movie['genres'][] = array(
					'id' => (int) $genre['g_id'],
					'links' => array(
						array('rel' => 'self', 'href' => $app['url_generator']->generate('genres.detail', array('id' => $genre['g_id']))),
						array('rel' => 'movies', 'href' => $app['url_generator']->generate('genres.movies', array('id' => $genre['g_id']))),
					)
				);
			}

			// inject links
			$movie['links'] = array(
				array('rel' => 'self', 'href' => $app['url_generator']->generate('movies.detail', array('id' => $movie['id']))),
				array('rel' => 'photos', 'href' => $app['url_generator']->generate('movies.photos', array('id' => $movie['id']))),
			);

		}

		$app['response']->setContent(array(
			'size' => sizeof($movies),
			'movies' => $movies,
			'links' => array(
				array('rel' => 'self', 'href' => $app['url_generator']->generate('movies.overview')),
				array('rel' => 'root', 'href' => $app['url_generator']->generate('root')),
			)
		));

		// Return the response
		return $app['response'];

	}


	public function detail(Application $app, $id) {

		// Get movie from DB
		$movie = $app['db.movies']->find($id);

		// No movie found
		if (!$movie) {
			$app['response']->setStatusCode(404);
			$app['response']->setContent('Invalid Movie ID');
		}

		// Movie found
		else {

			// inject plain description
			$movie['description_plain'] = strip_tags(str_replace('<br />', PHP_EOL, $movie['description']));

			// inject covers
			$movie['cover_big'] = '/' . $app['paths']['movies']['covers_big'] . '/' . $movie['id'] . '.jpg';
			$movie['cover_small'] = '/' . $app['paths']['movies']['covers_small'] . '/' . $movie['id'] . '.jpg';

			// inject actors and directors with link
			$movie['actors'] = array();
			$movie['directors'] = array();
			$people = $app['db.movies']->getPeople($movie['id']);
			foreach($people as $person) {
				$movie[$person['role'] . 's'][] = array(
					'id' => (int) $person['p_id'],
					'links' => array(
						array('rel' => 'self', 'href' => $app['url_generator']->generate('people.detail', array('id' => $person['p_id']))),
						array('rel' => 'movies', 'href' => $app['url_generator']->generate('people.movies', array('id' => $person['p_id']))),
					)
				);
			}

			// inject genres with links
			$movie['genres'] = array();
			$genres = $app['db.movies']->getGenres($movie['id']);
			foreach($genres as $genre) {
				$movie['genres'][] = array(
					'id' => (int) $genre['g_id'],
					'links' => array(
						array('rel' => 'self', 'href' => $app['url_generator']->generate('genres.detail', array('id' => $genre['g_id']))),
						array('rel' => 'movies', 'href' => $app['url_generator']->generate('genres.movies', array('id' => $genre['g_id']))),
					)
				);
			}

			// inject links
			$movie['links'] = array(
				array('rel' => 'index', 'href' => $app['url_generator']->generate('movies.overview')),
				array('rel' => 'self', 'href' => $app['url_generator']->generate('movies.detail', array('id' => $movie['id']))),
				array('rel' => 'photos', 'href' => $app['url_generator']->generate('movies.photos', array('id' => $movie['id']))),
			);

			$app['response']->setContent($movie);

		}

		// Return the response
		return $app['response'];

	}

	public function insert(Application $app) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function update(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function delete(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

	public function photos(Application $app, $id) {
		// @TODO – Don't forget to return $app['response'] in the end!
	}

}