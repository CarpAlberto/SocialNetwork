var express = require('express'),
    chat = require('./routes/chat'),
    login = require('./routes/autentificare'),
    editProfile = require('./routes/editProfile')
	port = 2345;
 
var app = express();

//activam posibilitatea de a lua parametrii JSON de la utilizatori
app.use(express.bodyParser());
app.use(express.cookieParser());
app.use(express.session({secret: '1234567890QWERTY'}));
app.get('/chat/getAllMessages/:userId', chat.getAllMessages);
app.post('/chat/postMessage/:sourceId/:destinationId', chat.postMessage);
app.get('/chat/GetHistory/:scrId/:destId', chat.GetHistory);
app.post('/autentificare/:Email/:password',login.autentificare);
app.post('/editProfile/UpdatePhone/:userId',editProfile.UpdatePhone);
app.post('/editProfile/UpdateEmail/:userId',editProfile.UpdateEmail);
app.post('/editProfile/UpdateLocatie/:userId',editProfile.UpdateLocatie);
app.post('/editProfile/UpdateBirth/:userId',editProfile.UpdateBirth);
app.post('/editProfile/UpdateSex/:userId',editProfile.UpdateSex);
app.post('/editProfile/UpdateFacultate/:userId',editProfile.UpdateFacultate);
app.post('/editProfile/UpdateLiceu/:userId',editProfile.UpdateLiceu);
app.listen(port);
console.log('Listening on port ' + port + '...');