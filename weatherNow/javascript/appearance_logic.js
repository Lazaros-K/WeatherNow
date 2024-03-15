var form_status = document.getElementById("status-code").innerHTML

var weather_tab_element = document.getElementsByClassName("content_box")
var cityname_input_tab_element = document.getElementById("cityname_input_tab")

if(form_status != 10) {
    weather_tab_element[0].style.display = "none";
    cityname_input_tab_element.style.display = "inline";
}
else {
    weather_tab_element[0].style.display = "inline";
    cityname_input_tab_element.style.display = "none";
}

function displayToggle(ElementId,display) {
    let element = document.getElementById(ElementId);
    if(element.style.display === "none") {
        element.style.display = display;
        element.style.top = "490px";
        return true;
    }

    element.style.display = "none";
    return false;
    
}

function openForm(BtnId,ElementId,display,textopen,textclose) {
    
    let btnElement = document.getElementById(BtnId);
    let open_close = displayToggle(ElementId,display);
    
    if(open_close) {
        btnElement.innerHTML = textopen;
        return true;
    }

    btnElement.innerHTML = textclose;
    return false;
}