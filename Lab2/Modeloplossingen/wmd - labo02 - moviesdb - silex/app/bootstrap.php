<?php

// Require Composer Autoloader
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// Create new Silex App
$app = new Silex\Application();

// Path config
// @TODO: put this in a config file
$app['paths'] = array(
	'movies' => array(
		'covers_big' => '/files/movies/covers/big/',
		'covers_small' => '/files/movies/covers/small/',
		'photos' => '/files/movies/photos/'
	),
	'people' => array(
		'photos' => '/files/people/'
	)
);

// Use Doctrine
// @TODO: put this in a config file
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
	'db.options' => array(
		'dbname' => 'moviesdb',
	    'user' => 'root',
	    'password' => 'Azerty123',
	    'host' => 'localhost',
	    'driver' => 'pdo_mysql'
	)
));

// Use Repository Service Provider — @note: Be sure to install RSP via Composer first!
$app->register(new Knp\Provider\RepositoryServiceProvider(), array(
	'repository.repositories' => array(
		'db.movies' => 'Api\\Repository\\MoviesRepository',
		'db.genres' => 'Api\\Repository\\GenresRepository',
		'db.people' => 'Api\\Repository\\PeopleRepository'
	)
));

// Create Response instance to use
$app['response'] = $app->share(function() {
	return new \Ikdoeict\Http\Rest\Response();
});

// Use URL Generator
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

// Use Validator
$app->register(new Silex\Provider\ValidatorServiceProvider());