
export function get_cookie(data_name) {
    let decodedCookie = decodeURIComponent(document.cookie);
    let arrCookies = decodedCookie.split(" ")
    for(let i = 0; i<arrCookies.length; i++) {
      let CookieParts = arrCookies[i].split("=")
      if(CookieParts[0] == data_name) {
        return CookieParts[1].replace(';', '');
      }
    }
    return "";
}

export function update_cookies(info_name,info,days) {
    const date1 = new Date();
    date1.setTime(date1.getTime() + (days*24*60*60*1000));

    document.cookie = info_name + "=" + info + ";" + date1 + ";";
}