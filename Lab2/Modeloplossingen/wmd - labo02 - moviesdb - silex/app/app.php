<?php

// Bootstrap
require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

// Use Request from Symfony Namespace
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Error Handling
$app->error(function (\Exception $e) use ($app) {
	$app['response']->setStatusCode(501); // Just give back a "Not Implemented"
	$app['response']->setContent('');
	return $app['response'];
});

// Index
$app->get('/', function() use ($app) {

	$app['response']->setStatusCode(400);

	$app['response']->setContent(array(
		'index' => 'Welcome to the MoviesDB API',
		'links' => array(
			array(
				'rel' => 'movies',
				'href' => $app['url_generator']->generate('movies.overview')
			),
			array(
				'rel' => 'genres',
				'href' => $app['url_generator']->generate('genres.overview')
			),
			array(
				'rel' => 'people',
				'href' => $app['url_generator']->generate('people.overview')
			)
		)
	));

	return $app['response'];

})->bind('root');

// Mount the entities of our API on base routes
$app->mount('/movies', new Api\Provider\Controller\MoviesController());
$app->mount('/genres', new Api\Provider\Controller\GenresController());
$app->mount('/people', new Api\Provider\Controller\PeopleController());