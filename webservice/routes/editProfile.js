var MySQLPool = require("mysql-pool").MySQLPool;
var pool = new MySQLPool({
	poolSize: 4,
	user:     "root", 
	password: "",
	database: "Tema2",
	host: "127.0.0.1",
	port: "3306"
});


exports.UpdatePhone = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var phone =  "'" + req.body.phone + "'";
	var query = 'update info_useri set Telefon = ' + phone  + " where ID = " + 	id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};

exports.UpdateEmail = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Email =  "'" + req.body.Email + "'";
	var query = 'update useri set Email = ' + Email  + " where ID = " + 	id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};

exports.UpdateLocatie = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Oras =  "'" + req.body.Oras + "'";
	var Tara =  "'" + req.body.Tara + "'";
	var query = 'update info_locatie set Oras = ' + Oras  + " , Tara = " + Tara + " where ID = " + id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};
exports.UpdateBirth = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Day   =  req.body.Day;
	var Month =  req.body.Month;
	var Year  =  req.body.Year;
	var date = new Date(Year,Month,Day);
	date = "'" + date + "'";
	var query = 'update info_useri set Data_Nasterii  =  ' + date  + " where ID = " + id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};
exports.UpdateSex = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Sex =  req.body.Sex;
	var query = 'update info_useri set Sex = ' + Sex  + " where ID = " + 	id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};

exports.UpdateFacultate = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Facultate =  "'" + req.body.Facultate + "'";
	var query = 'update info_studii set Facultate = ' + Facultate  +  " where ID = " + id;
	console.log(query);
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err)
		{
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};

exports.UpdateLiceu = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var Liceu =  "'" + req.body.Liceu + "'";
	var query = 'update info_studii set Liceu = ' + Liceu  +  " where ID = " + id;
	console.log(query);
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err)
		{
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			
            res.end(JSON.stringify(rows));
		}
	});
};



