var marker ; //CREA OBJETO MARCADOR
var route = [];
var polilinea;
var map; 

window.addEventListener("load", init_page, true); 

function init_page(){
    var today = moment().format('YYYY-MM-DD');
    document.getElementById("start_calendar").value = today;
    document.getElementById("end_calendar").value = today;  
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), { //ASOCIAR VARIABLE CON ID
        zoom: 16,
        center: {lat: 11.019010, lng: -74.850505}
    });
}

function send_button_function(){

    var datetime_start = document.getElementById("start_calendar").value + " " + 
        document.getElementById("start_time").value + ":00"; 

    var datetime_end = document.getElementById("end_calendar").value + " " + 
        document.getElementById("end_time").value + ":00"; 

    var return_first = function () {
        var tmp = null;
        $.ajax({
            'data': { date_time_start : datetime_start, date_time_end : datetime_end }, 
            'async': false,
            'type': "POST",
            'global': false,
            'dataType': 'html',
            'url': "server_register.php",
            'success': function (data) {
                tmp = data;
            }
        });
        return tmp;     
    }();

    if (return_first==null) {
        return_first="";
    }

    //alert(return_first);
    var data = JSON.parse(return_first);
    var latitude;
    var longitude;
    
    data.forEach(function(element){
        if(element.latitude != undefined && element.longitude != undefined){
            //console.log(element.latitude);
            //console.log(element.longitude);
            route.push({lat: parseFloat(element.latitude), lng: parseFloat(element.longitude)})
        }
    });
    
    polilinea = new google.maps.Polyline({
        path: route,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });
      
      data=null;
      polilinea.setMap(map);

}

function removeLine() {
    polilinea.setMap(null);
  }