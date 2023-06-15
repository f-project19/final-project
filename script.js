document.addEventListener("DOMContentLoaded", function() {
    var contactLink = document.getElementById("contact-link");
    contactLink.addEventListener("click", function(event) {
      event.preventDefault();
      var email = "maxmaxmax888888@gmail.com";
      var name = "鄭宇廷";
      var message = "請聯絡：" + name + "，電子郵件：" + email;
      alert(message);
    });
  
    document.getElementById("search-button").addEventListener("click", function() {
      var searchTerm = document.getElementById("search-input").value;
      if (searchTerm.trim() !== "") {
        fetchSearchResults(searchTerm);
      } else {
        clearSearchResults();
      }
    });
    
    function fetchSearchResults(searchTerm) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          document.getElementById("search-results").innerHTML = response;
        }
      };
      xhttp.open("GET", "search.php?term=" + searchTerm, true);
      xhttp.send();
    }
    
    function clearSearchResults() {
      document.getElementById("search-results").innerHTML = "";
    }
  });
  