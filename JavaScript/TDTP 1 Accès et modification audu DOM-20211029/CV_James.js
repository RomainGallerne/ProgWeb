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
    const acteurs = ['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig'];
    acteurs.forEach((item,index) => {
        if ($("#photo").attr("src")==(item.concat(".jpg"))){
            goodIndex = index;
        }
    })
    if (goodIndex == 5) { $("#photo").attr("src",(acteurs[0].concat(".jpg"))); }
    else { $("#photo").attr("src",(acteurs[goodIndex+1].concat(".jpg"))); }
}

var cocktails = [
 {'nom':'VM','amateurs':['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig']},
 {'nom':'Vesper','amateurs':['Craig']},
 {'nom':'Collins','amateurs':['Connery']},   
 {'nom':'Mint J','amateurs':['Connery']},
 {'nom':'The Mac', 'amateurs':['Craig']}
];

function afficherCocktails(){
    $("#listeCocktails").empty();
    let acteurCourant;
    let html = "";
    const acteurs = ['Connery', 'Lazenby', 'Moore', 'Dalton', 'Brosnan', 'Craig'];
    acteurs.forEach((item) => {
        if ($("#photo").attr("src")==(item.concat(".jpg"))){
            acteurCourant = item;
        }
    })
    for (let objet of cocktails) {
        if (objet.amateurs.includes(acteurCourant)) {
            html += "<li>"+objet.nom+"</li>";
        }
    }
    $("#listeCocktails").append(html);
}