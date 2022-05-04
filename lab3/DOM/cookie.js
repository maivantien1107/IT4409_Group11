function getCookieBlog(name) {
        var cookieArr = document.cookie.split(";"); 
        for(var i = 0; i < cookieArr.length; i++) {
            var cookiePair = cookieArr[i].split("=");
            if(name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
    
        return null;
    }
    
    function addCookieBlog () {
            var dataCookie = document.form.text.value;
    
            if(dataCookie == ""){
                    return false;
            } else {
                    var oldCookie = getCookieBlog("cookie");
                    var cookievalue = "";
                    if(oldCookie != null){
                            cookievalue= encodeURIComponent(oldCookie + " " + dataCookie); 
                    } else {
                            cookievalue = encodeURIComponent(dataCookie);
                    }
                    var maxAge = "; max-age=" + 1*24*60*60 + ";";
                    document.cookie="cookie=" + cookievalue + maxAge;
                   document.form.text.value = "";
            }
    }
    
    function loadCookieBlog () {
            var allCookie = getCookieBlog("cookie")
            let start = 0;
            let finish = allCookie.length;
            let i = 0;
            while(true){
                    for (i=start; i<finish; i++){
                            if(allCookie[i] == " ") break;
                    }
    
                    var tmpCookie = allCookie.substring(start, i);
                    document.writeln(tmpCookie + "<br />");
                    start = i + 1;
                    if(start >= finish) break;
            }
    }