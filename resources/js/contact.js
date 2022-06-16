let contact = document.querySelector(".contact");
if (contact !== null) {
    contact.addEventListener("submit", function (event) {
        alert("Сообщение было отправлено.");
    });
}