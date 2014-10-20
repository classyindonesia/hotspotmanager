var http = require('http');
/*
http.createServer(function (request, response) {
  response.writeHead(200, {'Content-Type': 'text/plain'});
  response.end('Hello World\n');
}).listen(1337, '127.0.0.1');
console.log('Server running at http://127.0.0.1:1337/');
*/

http.createServer(function(request, response){
	response.writeHead(200);
	response.write('hello world!');
	response.end();
}).listen(8080);
console.log('listening port 8080...');