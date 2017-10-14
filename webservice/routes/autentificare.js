//incarc pluginul care lucreaza cu baza de date
var MySQLPool = require("mysql-pool").MySQLPool;
//setez detaliile de configurare. 
//Pentru exemplul de fata am configurat un pool de conexiuni de dimensiune 4,
//adica se pot face 4 requesturi simultan 

var pool = new MySQLPool({
	poolSize: 4,
	user:     "root", 
	password: "",
	database: "Tema2",
	host: "127.0.0.1",
	port: "3306"
});
function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds(); 
    if(month.toString().length == 1) {
        var month = '0'+month;
    }
    if(day.toString().length == 1) {
        var day = '0'+day;
    }   
    if(hour.toString().length == 1) {
        var hour = '0'+hour;
    }
    if(minute.toString().length == 1) {
        var minute = '0'+minute;
    }
    if(second.toString().length == 1) {
        var second = '0'+second;
    }   
    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;   
     return dateTime;
}
exports.autentificare = function(req, res, next) {
	//setez headerele pentru access local
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	//iau parametrul care l-a trimis apelantul (utilizatorul care cere mesajele)
	var email = req.params.Email;
	var password = req.params.password;

	//formez query-ul de cautare in baza de date, dupa userId si mesajele necitite (read==0)
	var query = "select * from  useri where Email='" + email + "' and Parola = '" + password + "'";
	var query2 = "select userStatus.ID as Status from userStatus inner join info_useri on info_useri.Status = userStatus.ID inner join useri on useri.ID_Info = info_useri.ID where Email = '" + email  + "'";
	var now =  getDateTime();
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
			if(rows.length > 0)
			{
				req.session.userid = rows[0].ID;
                req.session.loggedIn = true;
	           	pool.query(query2, function(err, rows, fields) {					 
					res.header("Content-Type:","application/json");
					if (err) 
					{
						
						console.log(err+"");
					} 
					else 
					{
						if(rows.length > 0)
					    {
					    	var query3 = "update userstatus set Status = 1,UpdateTime = '" + now + "' where ID = " + rows[0].Status ;
				           	pool.query(query3, function(err, rows, fields) {					 
							res.header("Content-Type:","html");
							if (err) 
							{
								
								console.log(err+"");
							} 
							else 
							{    
							    //res.location('/home');  
							    console.log(req.session);
								res.end(JSON.stringify({'response':'ok','id' : req.session.userid}));
							}
					      });
					   }
					}
			   });
		   }
		   else
		   {
		   	 res.end(JSON.stringify({'response':'error'}));
		   }
		}
	});
};
