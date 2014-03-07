<?php

/**
 * BOOTSTRAP
 * ===============
 */

	// In case one is using PHP 5.4's built-in server
	$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
	if (php_sapi_name() === 'cli-server' && is_file($filename)) {
	    return false;
	}

	// Use composer autoloader
	require_once __DIR__ . '/vendor/autoload.php';

	// Create a router and a response
	$router = new Bramus\Router\Router();
	$response = new Ikdoeict\Http\Rest\Response();

	// Before Router Middleware
	$router->before('GET', '/.*', function() {
		header('X-Powered-By: bramus/router');
	});

	// Allow any OPTIONS request; Most likely it's the preflight CORS request
	$router->options('(.*)', function() {
		header('Access-Control-Allow-Origin: *'); // CORS: Allow this API to be called from anywhere
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		exit();
	});

	// Before middleware: these are executed before the actual call is processed
	$router->before('GET|POST|PUT|DELETE', '(.*)', function() {
		header('Access-Control-Allow-Headers: X-Api-Key'); // Allow/Require X-Api-Key via Headers
	});

	// Before middleware: require an API key
	/*
	$router->before('GET|POST|PUT|DELETE', '.*', function() use ($response) {
		$headers = apache_request_headers();
		if(!isset($headers['X-Api-Key']) || ($headers['X-Api-Key'] != 'test')) {
			$response->setStatus(401);
			$response->setContent('Missing or invalid API Key.');
		}
	});
	*/

	// Override the 404
	$router->set404(function() use ($response) {
		$response->setStatus('501');
		$response->setContent('Not Implemented ...');
		$response->finish();
	});



/**
 * ROUTING
 * ===============
 */



/**
 * INDEX
 * ---------------
 */

	// Index
	$router->get('/', function() use ($response) {
		$response->setStatus(400);
		$response->setContent(array(
			'index' => 'Welcome to the MoviesDB API',
			'links' => array(
				array('rel' => 'movies', 'href' => '/movies'),
				array('rel' => 'genres', 'href' => '/genres'),
				array('rel' => 'people', 'href' => '/people')
			)
		));
	});



/**
 * MOVIES
 * ---------------
 */

	// Movies: Overview
	$router->get('/movies', function() use ($response) {
		$response->setContent('@TODO Movies: Overview');
	});

	// Movies: Insert
	$router->post('/movies', function() use ($response) {
		$response->setContent('@TODO Movies: Add');
	});

	// Movies: Detail
	$router->get('/movies/(\d+)', function($id) use ($response) {
		$response->setContent('@TODO Movie #' . $id . ' detail');
	});

	// Movies: Update
	$router->put('/movies/(\d+)', function($id) use ($response) {
		$response->setContent('@TODO Movie #' . $id . ' update');
	});

	// Movies: Delete
	$router->delete('/movies/(\d+)', function($id) use ($response) {
		$response->setContent('@TODO Movie #' . $id . ' delete');
	});

	// Movies: Detail: Photos
	$router->get('/movies/(\d+)/photos', function($id) use ($response) {
		$response->setContent('@TODO Movie #' . $id . ' photos');
	});



/**
 * GENRES (mounted on baseroute)
 * ---------------
 */

	$router->mount('/genres', function() use ($router, $response) {

		// Overview
		$router->get('/', function() use ($response) {
			$response->setContent('@TODO Genres: Overview');
		});

		// Insert
		$router->post('/', function() use ($response) {
			$response->setContent('@TODO Genres: Add');
		});

		// Detail
		$router->get('/(\d+)', function($id) use ($response) {
			$response->setContent('@TODO Genre #' . $id . ' detail');
		});

		// Update
		$router->put('/(\d+)', function($id) use ($response) {
			$response->setContent('@TODO Genre #' . $id . ' update');
		});

		// Delete
		$router->delete('/(\d+)', function($id) use ($response) {
			$response->setContent('@TODO Genre #' . $id . ' delete');
		});

		// Movies in Genre
		$router->get('/(\d+)/movies', function($id) use ($response) {
			$response->setContent('@TODO Genre #' . $id . ' movies');
		});

	});



/**
 * PEOPLE
 * ---------------
 */

	// @TODO



/**
 * RUN FORREST RUN!
 * ===============
 */

	$router->run(function() use ($response) {
		$response->finish();
	});