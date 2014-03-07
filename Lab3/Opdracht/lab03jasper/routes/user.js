
/*
 * GET users listing.
 */

var mysql = require('mysql');

exports.list = function(req, res){

  	//connect to mysql database
	var connection = mysql.createConnection({
		host : 'localhost',
		user : 'root',
		password : 'Azerty123',
		database : 'moviesdb'
	});
	connection.connect();
};