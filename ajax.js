   function makePOSTRequest(url,params,div) { 
    var http_request = false; 
 
    if (window.XMLHttpRequest) { // Mozilla, Safari,... 
      http_request = new XMLHttpRequest(); 
    } else if (window.ActiveXObject) { // IE 
      http_request = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 

    if (!http_request) { 
      alert('Giving up:( Cannot create an XMLHTTP instance'); 
      return false; 
    } 

    http_request.onreadystatechange = function() {  getContents(http_request,div); }; 
    http_request.open("POST", url, true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send(params);
  }

  function getContents(http_request,div) { 
    if (http_request.readyState == 4) { 
      if (http_request.status == 200) { 
       // alert("test");
        document.getElementById(div).innerHTML = http_request.responseText; 
      } else { 
        alert('There was a problem with the request.'); 
      } 
    }
  }
     
   