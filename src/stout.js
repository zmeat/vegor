var express = require('express');
var bodyParser = require('body-parser');
var colors = require('colors/safe');
var app = express();
var port = 3334;

colors.setTheme({
	silly: 'rainbow',
	log: 'grey',
	verbose: 'cyan',
	prompt: 'grey',
	info: 'green',
	data: 'grey',
	help: 'cyan',
	warn: 'yellow',
	debug: 'blue',
	error: 'red'
});

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
				console.info(colors.info(convertData(data)));
				break;
			case 'warn' :
				console.warn(colors.warn(convertData(data)));
				break;
			case 'error' :
				console.error(colors.error(convertData(data)));
				break;
			case 'debug' :
				console.debug(colors.debug(convertData(data)));
				break;
			default: console.log(data);
		}
	}

	return res.end();
});

function convertData(data) {
	if(Object.prototype.toString.call(data) == "[object Object]") {
		data = JSON.stringify(data);
	}

	if(Object.prototype.toString.call(data) == "[object Array]") {
		data = JSON.stringify(data);
	}

	if(Object.prototype.toString.call(data) == "[object Function]") {
		data = data.toString();
	}

	return data;
}

app.listen(port);