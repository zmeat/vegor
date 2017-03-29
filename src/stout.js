var express = require('express');
var bodyParser = require('body-parser');
var app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.post('/', function (req, res) {
	console.log(req.body);
	return res.end();
});

app.listen(3334);