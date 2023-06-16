function removeItem(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "remove.php?id=" + itemId, true);
    xhr.onload = function() {
      if (this.status == 200) {
        var row = document.getElementById("item_" + itemId);
        row.parentNode.removeChild(row);
  
        // Make a new AJAX request to update the total price
        var xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "total_price.php", true);
        xhr2.onload = function() {
          if (this.status == 200) {
            document.getElementById("total_price").innerHTML = this.responseText;
          } else {
            console.log("Error updating total price");
          }
        };
        xhr2.send();
      } else {
        console.log("Error removing item");
      }
    };
    xhr.send();
  }