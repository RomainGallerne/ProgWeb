$().ready(function(){
    $.getJSON("http://localhost:8888/type", function(data) {
        let increment = 1;
        let nbType = 0;
        for (let type of data){
            $.getJSON("http://localhost:8888/type/"+type, function(data2) {
                let html = "<h3>"+type+"</h3> <div id="+type+">";
                nbType++;
                for (let etablissement of data2){
                    html += "<input type=checkbox name="+increment+">"+etablissement.nom+"</input> ";
                    //createOverlay(etablissement, increment);
                    increment++;
                }
                html += "</div>";
                $("#points_interet").append(html);
                if (data.length == nbType){
                    console.log(html);
                    $("#points_interet").accordion({collapsible: true, heightStyle: "content"});
                }
            })
        }
    })
});

var map = new ol.Map({
    target: "map",
    layers: [new ol.layer.Tile({source: new ol.source.OSM()})],
    view: new ol.View({
        center: ol.proj.fromLonLat([3.876716,43.61]),
        zoom: 14
    })
});

var markers = [];
function createOverlay(etablissement, num){
    let image = $("#markerProto").clone();
    image.attr("id","marker"+num);
    $("body").append(image);
                    
    markers.push(new ol.Overlay({
        position: ol.proj.fromLonLat([etablissement.long, etablissement.lat]),
        positioning: "center-center",
        element: document.getElementById(increment)
    }));
    map.addOverlay(markers[num]);
    markers[num].getElementById().style.display="block";
}

$("body").on("change", "input[type=checkbox]", function(){
    let num = $(this).attr('id');
    if ($(this).is(":checked")) markers[num].getElementById().style.display="block";
    else markers[num].getElementById().style.display="none";
});