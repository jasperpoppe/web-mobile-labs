<?php

/**
 * BOOTSTRAP
 * ===============
 */



	/**
	 * REQUIRES AND THE LIKE
	 * ---------------
	 */

		// Make it so that PHP 5.4's built-in server can serve static files
		$filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
		if (php_sapi_name() === 'cli-server' && is_file($filename)) {
		    return false;
		}

		// require autoloader
		require_once __DIR__ . '/../vendor/autoload.php';



	/**
	 * DEPENDENCIES
	 * ---------------
	 */

		// Create DIC
		$dic = new \Pimple();

		// Configuration
		$dic['config'] = $dic->share(function() {
			$env = getenv('APP_ENV') ?: 'production';
			return new \Bramus\Config\PhpConfig(__DIR__ . '/../config/' . $env . '.php');
		});

		// Database
		$dic['db'] = $dic->share(function() use ($dic) {
			return \Doctrine\DBAL\DriverManager::getConnection($dic['config']['db'], new \Doctrine\DBAL\Configuration());
		});

		// Request
		$dic['request'] = $dic->share(function() {
			return new \Bramus\Http\Request();
		});

		// Response
		$dic['response'] = $dic->share(function() {
			return new \Bramus\Http\RestResponseSimple();
		});

		// Router
		$dic['router'] = $dic->share(function() {
			return new \Bramus\Router\Router();
		});



	/**
	 * PREFLIGHT
	 * ---------------
	 */

		// Before middleware
		$dic['router']->before('GET|POST|DELETE|PUT|OPTIONS', '(.*)', function() use ($dic) {

			// Let the world know we use bramus/router
			header('X-Powered-By: bramus/router');

			// CORS
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
			header('Access-Control-Allow-Headers: Content-type');
			if ($dic['request']->getMethod() == 'OPTIONS') $dic['response']->finish();

		});

		// If data is sent as a payload (as Angular might do), fill $_POST with that data
		// @link http://stackoverflow.com/a/19870028/2076595
		$dic['router']->before('POST', '(.*)', function() {
			$content_type_args = explode(';', $_SERVER['CONTENT_TYPE']);
			if ($content_type_args[0] == 'application/json') {
				$_POST = json_decode(file_get_contents('php://input'), true);
			}
		});

		// Override the 404
		$dic['router']->set404(function() use ($dic) {
			$dic['response']->setStatusCode('501');
			$dic['response']->setContent('Not Implemented ...');
			$dic['response']->finish();
		});



/**
 * ROUTING
 * ===============
 */



	/**
	 * INDEX
	 * ---------------
	 */

		$dic['router']->get('/', function() use ($dic) {
			$dic['response']->setStatusCode(400);
			$dic['response']->setContent(array(
				'index' => 'Hi there, skipper!',
				'links' => array(
					array('rel' => 'todos', 'href' => '/todos')
				)
			));
		});


	/**
	 * TODOS (mounted on baseroute)
	 * ---------------
	 */

		$dic['router']->mount('/todos', function() use ($dic) {

			$controller = new \Api\Controller\Todos($dic);

			$dic['router']->get('/', array($controller, 'overview'));
			$dic['router']->post('/', array($controller, 'insert'));
			$dic['router']->get('/(\d+)', array($controller, 'detail'));
			$dic['router']->put('/(\d+)', array($controller, 'update'));
			$dic['router']->post('/(\d+)', array($controller, 'update')); // Fallback for frameworks such as Angular that send updates via POST instead of PUT ...
			$dic['router']->delete('/(\d+)', array($controller, 'delete'));

		});



/**
 * RUN FORREST RUN!
 * ===============
 */

	$dic['router']->run(function() use ($dic) {
		$dic['response']->finish();
	});

// EOF