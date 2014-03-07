
/*
 * GET people detailpage.
 */

var mysql = require('mysql');

exports.detailpeople = function(req, res){

  	//connect to mysql database
	var connection = mysql.createConnection({
	host : 'localhost',
	user : 'root',
	password : 'Azerty123',
	database : 'moviesdb'
	});

	connection.connect();

	connection.query('select * from people where id = ' + connection.escape(parseInt(req.param("peopleId"))), function(err, results) {
		res.send({people: results});
	});
};


/*
 * GET movies from people page.
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

	connection.query('select movies.* from movies inner join movies_people on movies.id = movies_people.m_id inner join people on movies_people.p_id = people.id where people.id = ' + connection.escape(parseInt(req.param("peopleId"))), function(err, results) {
		res.send({people: results});
	});
};