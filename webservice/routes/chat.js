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
/*Used for pooling messages.GetAll msg undread*/
exports.getAllMessages = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var id = parseInt(req.params.userId);
	var query = 'select conversatie_reply.Media as Media,conversatie_reply.ID as ID_r,conversatie_reply.Message as Mesaje,conversatie_reply.Time as Time,Photo_Profil as image ,Sender,info_useri.Nume,info_useri.Prenume from conversatie_reply inner join conversatie on conversatie.ID = conversatie_reply.ID_Conversatie inner join useri on useri.ID = if(Sender = User1,User1,User2) inner join info_useri on info_useri.ID = useri.Id_Info where (conversatie_reply.Status = 0 and Sender !=' + id +' AND (conversatie.User1=' + id  + ' or conversatie.User2 =' + id + ') )';
	//execut query-ul in baza de date. Deoarece Node.JS si JavaScript sunt asincrone, trebuie sa dau ca parametru un callback
	pool.query(query, function(err, rows, fields) {					 
		res.header("Content-Type:","application/json");
		if (err) {
			console.log(err+"");			 
			res.end(JSON.stringify([]));
		}
		else 
		{
			for (var i = 0; i < rows.length; i++) 
			{
				    var id_msg = rows[i].ID_r;
				    var query2="update conversatie_reply set Status = 1 ,Time = '" + getDateTime() + "' where ID = " + id_msg;
				    pool.query(query2, function(err, rows, fields) {					 
					if (err) {
						console.log(err+"");			 
						res.end(JSON.stringify([]));
					}
					else 
					{

					}
	           });
			};
		     console.log(rows);
            res.end(JSON.stringify(rows));
		}
	});
};


/**
   write a message into database
*/
exports.postMessage = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var srcId = parseInt(req.params.sourceId);
	var dstId = parseInt(req.params.destinationId);
	var timestamp =   "'" + getDateTime() + "'"; 
	var msg  = "'" + req.body.msg+ "'";
	var media = "'" + req.body.media + "'";
     /*Iau id-ul conversatieiei*/
    var querryConvId = "select ID from conversatie where (User1 = " + srcId +" and User2= " + dstId + ") or (User1 = " + dstId + "  and User2=" + srcId +")" 
    pool.query(querryConvId, function(err, rows, fields) {
		res.header("Content-Type:","application/json");
		var idConv;
		if (err) {
			//daca am eroare, scriu in consola serverului mesajul
			console.log(err+"");			 
		} 
		else
		{		
			//daca nu am eroare, iau id-ul conversatiei
			if(rows.length > 0)
			{
			     idConv = rows[0].ID;
			}
			else
			{
				//inseram in tabelul cu conversatiile o noua conversatie
				var querryInsert = "insert into conversatie values(''," + srcId + "," + dstId +"," + timestamp  + ")";
				pool.query(querryInsert, function(err, rows, fields) {
				res.header("Content-Type:","application/json");
				if (err)
				{
				     //daca am eroare, scriu in consola serverului mesajul
					console.log(err+"");			 
				} 
				else 
				{		
				  	 ///iau ultima conversatie inserata
				  	 var querySelectror =  "select id from conversatie order by id desc";
				  	 pool.query(querySelectror, function(err, rows, fields) {
						res.header("Content-Type:","application/json");
						if (err) {
							//daca am eroare, scriu in consola serverului mesajul
							console.log(err+"");			 
						} else {		
							//daca nu am eroare, trimit un mesaj de ACK
							idConv = rows[0].ID;

						}
					});	
				}
			   });
			}
			var queryupload = "insert into conversatie_reply values(''," + msg  + "," + timestamp + "," + 0 +"," + idConv + "," + srcId + "," + media + ") ";
			console.log(queryupload);
			pool.query(queryupload, function(err, rows, fields) {
			res.header("Content-Type:","application/json");
			if (err) {
				//daca am eroare, scriu in consola serverului mesajul
				console.log(err+"");			 
			} else {		
				//daca nu am eroare, trimit un mesaj de ACK
				res.end(JSON.stringify({'response':'ok'}));
			}
		});
	    }
	});
	//iau obiectul de tip mesaj care l-a trimis apelantul
};
/*--Pentru a lua istoricul mesajelor dintre doi utilizatori--*/
exports.GetHistory = function(req, res, next) {
	res.header("Access-Control-Allow-Origin", "*");
	res.header("Access-Control-Allow-Headers", "X-Requested-With");
	var srcId = parseInt(req.params.scrId);
	var dstId = parseInt(req.params.destId);
	var query = "select conversatie_reply.Media as Media,Nume,Prenume,Photo_Profil,conversatie_reply.Sender as Sender, conversatie_reply.Message as Mesaj from conversatie_reply inner join conversatie on conversatie.ID = conversatie_reply.ID_Conversatie inner join useri on (Useri.ID = Sender) inner join info_useri on useri.ID_info = info_useri.ID where (conversatie.User1 =" + srcId + " and conversatie.User2 =  " +  dstId + ") or (conversatie.User1 =  " + dstId + " and conversatie.User2 = " + srcId +") order by Time";
	pool.query(query, function(err, rows, fields) {		
		res.header("Content-Type:","application/json");
		if (err) 
		{
			console.log(err+"");			 
		} 
		else
		{		
		
			res.end(JSON.stringify(rows));
		}
	});
}
