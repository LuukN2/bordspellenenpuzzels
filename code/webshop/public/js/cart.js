function calculatePrice() {

    var price = document.getElementsByClassName("product_price");
    var quantity = document.getElementsByClassName("product_amount");
    var total = 0.00;
    for (i = 0; i < price.length; i++) {
        total += (price[i].value * quantity[i].value);
    }

    document.getElementById("output").innerHTML = "$" + total;
}