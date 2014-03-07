
/*
 * GET genres page.
 */

var mysql = require('mysql');

exports.genres = function(req, res){

 	//connect to mysql database
	var connection = mysql.createConnection({
		host : 'localhost',
		user : 'root',
		password : 'Azerty123',
		database : 'moviesdb'
	});
	connection.connect();
	
	connection.query('select * from genres', function(err, docs) {
		res.send({movies : docs});
	});
};


/*
 * GET genres detail page.
 */
exports.detailgenre = function(req, res){

 	//connect to mysql database
	var connection = mysql.createConnection({
		host : 'localhost',
		user : 'root',
		password : 'Azerty123',
		database : 'moviesdb'
	});
	connection.connect();
	
	connection.query('select * from genres where id = ' + connection.escape(parseInt(req.param("movieId"))), function(err, docs) {
		res.send({movies : docs});
	});
};


/*
 * GET movies of genre.
 */
exports.movies = function(req, res){

  //connect to mysql database
	var connection = mysql.createConnection({
	host : 'localhost',
	user : 'root',
	password : 'Azerty123',
	database : 'moviesdb'
	});

	connection.connect();

	connection.query('select movies.* from movies inner join movies_genres on movies.id = movies_genres.m_id inner join genres on movies_genres.g_id = genres.id where genres.id = ' + connection.escape(parseInt(req.param("genresId"))), function(err, results) {
		res.send({genres: results});
	});
};