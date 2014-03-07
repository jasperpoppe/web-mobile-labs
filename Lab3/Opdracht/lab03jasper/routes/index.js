
/*
 * GET home page.
 */

var mysql = require('mysql');

exports.index = function(req, res){
	res.send('hallo daar! Typ /movies in de url');
};

