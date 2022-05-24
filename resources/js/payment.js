// способ оплаты
$(document).on("change", ".payment-toggle", function (e) {
    $("#pay-output").val(this.value);
});

// стилизация выбранного способа оплаты
$(".payment-item").on("click", function (e) {
    $(".form__payment--item").removeClass("active-pay");
    $(this.parentNode).addClass("active-pay");
});

// оформление заказа
$(document).on("click", "#confirm-order", async function (e) {
    const _INVOICE_ID = Math.floor(Math.random() * 100000000);

    // общие настройки полей
    const _ID = this.dataset.id;
    const _AMOUNT = +$("#total").val() * 7.4;
    const _METHOD_PAY = $("#pay-output").val();
    //
    // // валидация для способа оплаты
    // if (_METHOD_PAY == null || _METHOD_PAY == "") {
    //     alert("Необходимо выбрать способ оплаты");
    //     return;
    // }

    // создаем заказ в БД
    // let response = (
    //     await axios.post(`/carts/${_ID}`, {
    //         code: _INVOICE_ID,
    //         pay: _METHOD_PAY,
    //         amount: _AMOUNT,
    //         status: 1,
    //         check: 0,
    //     })
    // ).data;

    // если оплата онлайн картой
    if (_METHOD_PAY == 1) {
        var auth = await axios.post("/token", {
            order: _INVOICE_ID,
            amount: _AMOUNT,
        });
        halyk.pay(
            createPaymentObject(auth.data, _INVOICE_ID, _AMOUNT)
        );
    }
    console.log(_METHOD_PAY);

    // если оплата наличкой
    if (_METHOD_PAY == 2) {
        window.location.href = window.location.origin + "/payment/" + _INVOICE_ID;
    }
});

// параметры для метода halyk.pay()
var createPaymentObject = function (auth, invoiceId, amount) {
    var paymentObject = {
        invoiceId: invoiceId,
        backLink: window.location.origin + "/payment/" + invoiceId,
        failureBackLink: window.location.origin,
        postLink: window.location.origin + "/success",
        failurePostLink: window.location.origin + "/failure",
        language: "RU",
        description: "Оплата в развлекательном центре",
        accountId: "ALIBEK-DIPLOM.RU",
        amount: amount,
        currency: "KZT",
        phone: "77777777777",
        email: "example@example.com",
        cardSave: true,
        terminal: "67e34d63-102f-4bd1-898e-370781d0074d",
    };

    paymentObject.auth = auth;
    return paymentObject;
};
