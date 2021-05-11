window.onload = function () {
    if (typeof(Storage) !== "undefined") {
      if (typeof localStorage["card-element"] !== "undefined") {
        document.getElementById("card-element").value = localStorage["card-element"] ? localStorage["card-element"] : "";
        

      }
      setInterval(function () {
        document.getElementById("cardDetails").innerHTML = "<br><br> Stripe API using test data so use the following to make payments<br>"
        +"Visa Card: 4242 4242 4242 4242 <br>"+
        "MM/YY: any month and year <br>"+
        "CVC: any digit <br>"+
        "ZIP: any zip code <br>";
        setTimeout(function () {
          document.getElementById("cardDetails").innerHTML = '';
        }, 50000);

      }, 10000);
    }
};

