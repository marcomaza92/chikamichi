// Dependencies
var path = require('path');
var http = require('http'); // Apache like
var mysql = require('mysql'); // MySQL for Nodejs
var express = require('express'); // Nodejs on steroids
var vue = require('express-vue'); // Direct handling between Express and Vuejs
var connection  = require('express-myconnection'); // Connection to the database
var parser = require('body-parser'); // Parser for requests

// Routes to CRUD operations
var routes = require('./routes'); // Looks for 'index.js' (= '/')

// Application definition
var app = express();

// View Engine definition
app.engine('vue', vue);
app.set('view engine', 'vue');

// Vue's Views and Components definition
app.set('views', path.join(__dirname, '/views'));
app.set('vue', {
    componentsDir: path.join(__dirname, '/views/components'),
    defaultLayout: 'layout'
});

// Port setting
app.set('port', process.env.PORT || 8081); // Where it the app listens

// Common files definition (CSS, JS, libs, media, etc.)
app.use(express.static(path.join(__dirname, 'public')));

// Parser definition
app.use(parser.urlencoded({
  extended: true // Enables all kinds of parsing
}));

// MySQL Connection
app.use(
    connection(mysql,{
        host: 'localhost',
        user: 'root',
        password : 'Muse1234/',
        port : 3306,
        database:'nodejs'
    },'pool') // Single or Pool
);

// Application methods
app.get('/', routes.list); // Looks for 'index.vue' and the 'list' function
app.get('/add', routes.add);
app.post('/add', routes.add_save);
app.get('/edit/:id', routes.edit);
app.post('/edit/:id', routes.edit_save);
app.get('/delete/:id', routes.delete);

// Application creation
http.createServer(app).listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port')); // Shows the application was created succesfully
});
