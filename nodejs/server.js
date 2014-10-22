var express =   require('express'),
    http =      require('http'),
    server =    http.createServer(app),
    dotenv = require('dotenv');
 
dotenv.load();

var app = express();
 
const redis =   require('redis');
const io =      require('socket.io');
const client =  redis.createClient();

var app_host = process.env.APP_HOST;
 


server.listen(5000, app_host);
 
io.listen(server).on('connection', function(client) {

  client.on('pesan: ', function (data) {
    console.log(data);
  });

 

    const redisClient = redis.createClient()
    redisClient.subscribe('chat');
  
    redisClient.on("message", function(channel, message) {
        //Channel is e.g 'score.update'
        client.emit(channel, message);
     });
 
    client.on('disconnect', function() {
        redisClient.quit();
    });
});
