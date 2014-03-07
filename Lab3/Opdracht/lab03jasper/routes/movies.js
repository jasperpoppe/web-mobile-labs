
/*
 * GET movies page.
 */

var mysql = require('mysql');

exports.movies = function(req, res){

 	//connect to mysql database
	var connection = mysql.createConnection({
		host : 'localhost',
		user : 'root',
		password : 'Azerty123',
		database : 'moviesdb'
	});
	connection.connect();
	
	connection.query('select * from movies', function(err, docs) {
		res.send({movies : docs});
	});
};


/*
 * GET movies detail page.
 */
exports.detailmovie = function(req, res){

 	//connect to mysql database
	var connection = mysql.createConnection({
		host : 'localhost',
		user : 'root',
		password : 'Azerty123',
		database : 'moviesdb'
	});
	connection.connect();
	
	connection.query('select * from movies where id = ' + connection.escape(parseInt(req.param("movieId"))), function(err, docs) {
		res.send({movies : docs});
	});
};