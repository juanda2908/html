//register.js
var start_calendar; 
var end_calendar;
window.addEventListener("load", main, false); 

function main(){
    
    start_calendar = new CalendarPopup("start_calendar"); 
    end_calendar = new CalendarPopup("end_calendar"); 
    
}


