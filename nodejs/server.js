var express =   require('express'),
    http =      require('http'),
    server =    http.createServer(app);
 
var app = express();
 
const redis =   require('redis');
const io =      require('socket.io');
const client =  redis.createClient();
 
server.listen(5000, 'localhost');
 
io.listen(server).on('connection', function(client) {

  client.on('sip: ', function (data) {
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
