let cart = document.querySelector("#cart-buy");
if (cart !== null) {
    cart.addEventListener("click", function (event) {
        if (!confirm("Вы хотите совершить \"покупку\"?")) {
            alert("\"Покупка\" была совершена.");
            event.preventDefault();
        }
    });
}