$(document).on("change", ".payment-toggle", function (e) {
    $("#pay-output").val(this.value);
});

$(document).on("click", "#confirm-order", async function (e) {
    const _INVOICE_ID = Math.floor(Math.random() * 100000000);

    const _AMOUNT = +$("#total").val() * 7.4;
    const _METHOD_PAY = $("#pay-output").val();
    console.log($('.res_date'));
    let res_dates = [];
    for(let obj of $('.res_date')) {
        res_dates.push(obj.innerText)
    }
    let table_ids = [];
    for(let obj of $('.table_id')) {
        table_ids.push(obj.value)
    }
    let guests = [];
    for(let obj of $('.res_guest')) {
        guests.push(obj.innerText)
    }

    if (_METHOD_PAY == null || _METHOD_PAY == "") {
        Swal.fire({
            icon: 'error',
            title: 'Ошибка',
            text: 'Выберите способ оплаты!'
        })
        return;
    }

    if (_AMOUNT == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Ошибка',
            text: 'Корзина пуста!'
        })
        return;
    }

    let order = await axios.post("/create-order", {
        code: _INVOICE_ID,
        pay: _METHOD_PAY,
        amount: _AMOUNT,
        check: 0,
        res_dates: res_dates,
        table_ids: table_ids,
        guests: guests
    });

    if (_METHOD_PAY == 1) {
        var auth = await axios.post("/token", {
            order: _INVOICE_ID,
            amount: _AMOUNT
        });
        halyk.pay(
            createPaymentObject(auth.data, _INVOICE_ID, _AMOUNT)
        );
    }

    if (_METHOD_PAY == 2) {
        var auth = await axios.post("/token", {
            order: _INVOICE_ID,
            amount: _AMOUNT / 2
        });
        halyk.pay(
            createPaymentObject(auth.data, _INVOICE_ID, _AMOUNT / 2)
        );
    }

    if (_METHOD_PAY == 3) {
        let text = $('#dostavka-info').val();
        if(!text) {
            Swal.fire({
                icon: 'error',
                title: 'Ошибка',
                text: 'Примечание обязательно для заполнения!'
            })
            return;
        }
        Swal.fire(
            'Успешно!',
            'Администратор свяжется с вами в ближайшее время!',
            'success'
        ).then(function (){
            window.location.href = "/dashboard/";
        })
    }
});

var createPaymentObject = function (auth, invoiceId, amount) {
    var paymentObject = {
        invoiceId: invoiceId,
        backLink: window.location.origin + "/success",
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
