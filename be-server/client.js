const UDP = require('dgram')

const client = UDP.createSocket('udp4')

const port = 1514;

const hostname = '0.0.0.0';

client.on('message', (message, info) => {
  console.log('Address: ', info.address, 'Port: ', info.port, 'Size: ', info.size)

  console.log('Message from server', message.toString())
})

const packet = Buffer.from('This is a message from client')

client.send(packet, port, hostname, (err) => {
  if (err) {
    console.error('ERROR: in sending packet')
  } else {
    console.log('Packet sent !!')
  }
})
