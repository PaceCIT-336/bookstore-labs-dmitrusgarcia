function viewSample($id) {
    let XHR = new XMLHttpRequest();  
      
    AsyncLoad();
    
    XHR.open("POST", "book_sample.php", true);
    XHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    XHR.send("id=" + $id);
    
    function AsyncLoad() {
      XHR.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("sampleBody").innerHTML = this.responseText;
        }
      };
    }
    
    modal.style.display = 'block';
  }
  