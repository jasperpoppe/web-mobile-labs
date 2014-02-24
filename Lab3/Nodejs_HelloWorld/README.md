Lab 3: Node.js
===============

Resource
---------------
Simple "hello world" example:
<http://howtonode.org/hello-node>

Hello console
---------------
You can run the file "hello-console.js" with "node hello-console.js" in the terminal

Hello HTTP
---------------
I'd guess that while it's not the only use case for node.JS, most people are using it as a web application platform. So the next example will be a simple HTTP server that responds to every request with the plain text message "Hello World"

First, in terminal: "node hello-http.js". The terminal shows "Server running at http://127.0.0.1:8000/".
So, I go to "localhost:8000" in my webbrower and I get the response.

Hello TCP
---------------
Node also makes an excellent TCP server, and here is an example that responds to all TCP connections with the message "Hello World" and then closes the connection.

Hello Router
---------------
Often you won't be using the node built-in libraries because they are designed to be very low level. This makes node quick, nimble, and easy to maintain, but is usually not enough to get started on a real world application. My first node framework is node-router. This example shows an HTTP server that responds with "Hello World" to all requests to "/" and responds with a 404 error to everything else.

In order to test this, you will need to install the node-router library. There are two ways to do this. You can either install it into a path that node recognizes (I create a symlink into ~/.node_libraries) or put the node-router.js file in your application and reference it locally. See the node docs on modules for more details on how modules work.


