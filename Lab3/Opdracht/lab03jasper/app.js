
/**
 * Module dependencies.
 */

var express = require('express');
var routes = require('./routes');
var movies = require('./routes/movies');
var genres = require('./routes/genres');
var people = require('./routes/people');
var http = require('http');
var path = require('path');
var mysql = require('mysql');

var app = express();

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.json());
app.use(express.urlencoded());
app.use(express.methodOverride());
app.use(app.router);
app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
  app.use(express.errorHandler());
}

app.get('/', routes.index);
app.get('/api/movies', movies.movies);
app.get('/api/movies/:movieId', movies.detailmovie);
app.get('/api/genres', genres.genres);
app.get('/api/genres/:genresId', genres.detailgenre);
app.get('/api/genres/:genresId/movies', genres.movies);
app.get('/api/people/:peopleId', people.detailpeople);
app.get('/api/people/:peopleId/movies', people.movies);

http.createServer(app).listen(app.get('port'), function(){
	console.log('Express server listening on port ' + app.get('port'));
});