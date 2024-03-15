
import {get_cookie, update_cookies} from "./cookies_functions.js";

var form_status = document.getElementById("status-code").innerHTML

var cityname = document.getElementById("city_name").innerHTML;

var cityname_form = document.getElementById("cityname_form");
var cityname_input = document.getElementById("cityname_input");
if(form_status == 0) {
    let cityname_cookie = get_cookie("cityname")
    if(cityname_cookie != "") {
        cityname_input.value = cityname_cookie;
    }
    update_cookies("cityname",cityname,14)
}
else if(form_status == 10) {
    update_cookies("cityname",cityname,14)
}
else {
    update_cookies("cityname","",0)
}

console.log(get_cookie("cityname"))