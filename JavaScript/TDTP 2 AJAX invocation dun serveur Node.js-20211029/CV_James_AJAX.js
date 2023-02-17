var largeurImage;
var hauteurImage;

function zoom(image){
    largeurImage = image.style.width; //On sauvegarde la largeur du DOM (celle du CSS d'origine)
    hauteurImage = image.style.height; //On sauvegarde la hauteur du DOM (celle du CSS d'origine)
    image.style.width = "auto"; //On met la largeur par défaut de l'image (plus grande donc)
    image.style.height = "auto"; //On met la hauteur par défaut de l'image (plus grande donc)
}

function dezoom(image){
    image.style.width = largeurImage; //On rétablie dans le DOM la valeur d'origine précédemment sauvegardé
    image.style.height = hauteurImage; //On rétablie dans le DOM la valeur d'origine précédemment sauvegardé
}

function carrousel(){
    let goodIndex;
    let importServ = "http://localhost:8888/fichier/";
    const acteurs = ['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig'];
    acteurs.forEach((item,index) => {
        console.log($("#photo").attr("src"));
        console.log(item.concat(".jpg"));
        if ($("#photo").attr("src")==(importServ.concat(item.concat(".jpg")))){
            goodIndex = index;
        }
    })
    console.log(goodIndex);
    if (goodIndex == 5) { $("#photo").attr("src",importServ.concat((acteurs[0].concat(".jpg")))); }
    else { $("#photo").attr("src",(importServ.concat(acteurs[goodIndex+1].concat(".jpg")))); }
}

function acteurCourant(){
    let importServ = "http://localhost:8888/fichier/";
    let acteurC;
    const acteurs = ['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig'];
    acteurs.forEach((item) => {
        if ($("#photo").attr("src")==(importServ.concat(item.concat(".jpg")))){
            acteurC = item;
        }
    })
    return acteurC;
}

function afficherCocktails(){
    $("#listeCocktails").empty();
    let lienActeur = ("http://localhost:8888/cocktails/".concat(acteurCourant()));
    let html = "";
    $.getJSON(lienActeur,function(data){
        $("#listeCocktails").append(data);
    })
}