var express = require("express");
var fs = require('fs');
var app = express();
app.listen(8888);

app.get('/', function(request, response) {
    console.log("Chargement de la page : 'CV_James_AJAX.html'");  
    response.sendFile('CV_James_AJAX.html', {root: __dirname});
});

app.get('/cocktails', function(request, response) {
    console.log("Renvoi de cocktails.json");    
    response.sendFile('cocktails.json', {root: __dirname});    
});

app.get('/fichier/:data',function(request, response) {
    console.log("Chargemenet de l'élément '"+request.params.data+"'");
    response.sendFile(request.params.data, {root: __dirname});
});

app.get('/cocktails/:acteur',function(request, response) {
    console.log("Chargemenet des cocktails de '"+request.params.acteur+"'");
    let jsonFile = fs.readFileSync('cocktails.json','utf8');
    let parsed = JSON.parse(jsonFile);
    console.log(parsed);
    let html ="";
    for (let objet of parsed) {
        if (objet.amateurs.includes(request.params.acteur)) {
            html += "<li>"+objet.nom+"</li>";
        } 
    }
    response.end(JSON.stringify(html));
});