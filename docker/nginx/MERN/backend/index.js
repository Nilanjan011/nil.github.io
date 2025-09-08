// index.js
const express = require('express');
const app = express();
const port = 3000; // This should match the port your Dockerfile exposes

// A simple route
app.get('/', (req, res) => {
  res.send('Hello from Express.js running inside ####### Docker with Nginx!!!!!!!');
});

// A simple route
app.get('/api/hello', (req, res) => {
  res.json({ message: 'Hello from Express.js running inside ####### Docker with Nginx!!!!!!!' });
});

// Start server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
