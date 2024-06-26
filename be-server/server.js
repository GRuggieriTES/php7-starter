http = require('http');
const express = require('express');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

const UDP = require('dgram');

const server = UDP.createSocket('udp4');

const httpPort = 3000;
const udpPort = 1514;

app.post('/', (req, res) => {
  console.log('Hello from HTTP server', req.body)
  res.send(`Hello from HTTP server, ${JSON.stringify(req.body)}`);
});

const httpServer = http.createServer(app);

httpServer.listen(httpPort, () => {
  console.log(`HTTP server is running on http://localhost:${httpPort}`);
});

server.on('listening', () => {
  const address = server.address();

  console.log('listening to ', 'Address: ', address.address, 'Port: ', address.port);
})

server.on('message', (message, info) => {
  console.log('Message', message.toString());

  const response = Buffer.from('Message Received');

  server.send(response, info.port, info.address, (err) => {
    if (err) {
      console.error('Failed to send response !!');
    } else {
      console.log('Response send Successfully');
    }
  })
})

server.bind(udpPort);
