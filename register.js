var marker ; //CREA OBJETO MARCADOR
var route = [];
var map; 

window.addEventListener("load", init_page, true); 

function init_page(){
    var today = moment().format('YYYY-MM-DD');
    document.getElementById("start_calendar").value = today;
    document.getElementById("end_calendar").value = today; 
    //alert(today); 
}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), { //ASOCIAR VARIABLE CON ID
        zoom: 16,
        center: {lat: 11.019010, lng: -74.850505}
    });
    //marker = new google.maps.Marker({ }); //CREA OBJETO MARCADOR     
    refresh();  // FUNCION PARA REFRESCAR PAGINA
    
    //setInterval(refresh,1000); //LLAMA LA FUNCION REFRESH CADA 2 SEGUNDOS
    
    function refresh(){

        var return_first = function () {
            var tmp = null;
            $.ajax({
                'async': false,
                'type': "POST",
                'global': false,
                'dataType': 'html',
                'url': "server.php",
                'success': function (data) {
                    tmp = data;
                }
            });
            return tmp;     
        }();

        if (return_first==null) {
            return_first="";
        }

        /*
        // Los datos que me importan (Lat, Long, Tiem) se encuentran en el salto 9, 
        por eso guardo en una variable esa linea y a su vez divido ese string cada 
        que encuentre un espacio
        */
        var data = return_first.split("\n"); 
        latitude = parseFloat(data[0]);
        longitude = parseFloat(data[1]);
        refresh_marker(latitude, longitude);
    }
     
    function refresh_marker(latitude, longitude){ 
    /* creamos el marcador y lo vamos refrescando en la función "holo" cuando 
    la llamamos con coor[0] y coor[1], ya que establecimos que los  parametros 
    fueran latitude, longitude.*/
        route.push(new google.maps.LatLng(latitude, longitude));
        polilinea();      
        var marker = new google.maps.Marker({  // función de api para crear marcador
            position: new google.maps.LatLng(latitude, longitude), // posición con coor[0] y coor[1]
            map: map,
            title: 'Syrus2G. Lat: ' + latitude + ' Lon: ' + longitude
            });
            //map.setCenter(new google.maps.LatLng(latitude, longitude)); // Movemos el centro hacia donde se encuentren los nuevos valores de coor[0] y coor[1]
    } 
     
    function polilinea() {
        var flightPath = new google.maps.Polyline({
            path:route,
            strokeColor:"",
            strokeOpacity:0.8,
            strokeWeight:2
        });
        flightPath.setMap(map);
    }
}

function send_button_function(){
    //alert("submit was pressed"); 
    //return true; 
    var datetime_start = document.getElementById("start_calendar").value + " " + 
        document.getElementById("start_time").value + ":00"; 

    var datetime_end = document.getElementById("end_calendar").value + " " + 
        document.getElementById("end_time").value + ":00"; 
    
    //alert(datetime_start + "\n" + datetime_end);

    //consula a la base de datos por medio del archivo php 
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

    alert(return_first); 
    display_history(return_first);
}

function display_history(vector){
    var i;
    var code_html = "";
    for (i = 0; i < vector.lenght; i++){
        //alert(i);
        //code_html += "<div>ID:" + vector[i].id + "latitude: " + vector[i].latitude + " longitude: " + vector[i].longitude  + "</div>";
        code_html += "<div>" + vector[i] +"</div>";
    }
    document.getElementById("history_section").innerHTML = code_html; 
}