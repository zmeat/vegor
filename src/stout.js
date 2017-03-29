var express = require('express');
var bodyParser = require('body-parser');
var app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.post('/', function (req, res) {
	if(req.body) {
		var body = req.body;
		var data = body.data;
		var func = body.func;

		switch (func) {
			case 'log' :
				console.log(data);
				break;
			case 'info':
				console.info(data);
				break;
			case 'warn' :
				console.warn(data);
				break;
			case 'error' :
				console.error(data);
				break;
			default: console.log(data);
		}
	}

	return res.end();
});

app.listen(3334);