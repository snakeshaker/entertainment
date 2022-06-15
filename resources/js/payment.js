$(document).on("change", ".payment-toggle", function (e) {
    $("#pay-output").val(this.value);
});

$(document).on("click", "#confirm-order", async function (e) {
    const _INVOICE_ID = Math.floor(Math.random() * 100000000);

    const _AMOUNT = +$("#total").val() * 7.4;
    const _METHOD_PAY = $("#pay-output").val();
    const DEL_INFO = $('#dostavka-info').val();

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

    let foodsArr = [];
    let foods = document.querySelectorAll('.food-name');
    let qtys = document.querySelectorAll('.menu_qty');
    let amounts = document.querySelectorAll('.menu_price');
    for(let i = 0; i < foods.length; i++) {
        let food = {};
        food.name = foods[i].innerHTML.trim().replace(/&nbsp;/g, '');
        food.qty = qtys[i].value;
        food.amount = amounts[i].innerHTML.trim().replace(/&nbsp;/g, '');
        foodsArr.push(food);
    }

    let resArr = [];
    let reses = document.querySelectorAll('.res_date');
    let tables = document.querySelectorAll('.table_id');
    for(let i = 0; i < reses.length; i++) {
        let res = {};
        res.date = reses[i].innerHTML.trim().replace(/&nbsp;/g, '');
        res.table = tables[i].value;
        resArr.push(res);
    }

    let songArr = [];
    let artists = document.querySelectorAll('.info-singer');
    let songNames = document.querySelectorAll('.info-song');
    let genres = document.querySelectorAll('.info-genres');
    for(let i = 0; i < artists.length; i++) {
        let song = {};
        song.artist = artists[i].innerHTML.trim().replace(/&nbsp;/g, '');
        song.songName = songNames[i].innerHTML.trim().replace(/&nbsp;/g, '');
        song.genre = genres[i].innerHTML.trim().replace(/&nbsp;/g, '');
        songArr.push(song);
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
        guests: guests,
        deliveryInfo: DEL_INFO,
        foodsArr: foodsArr,
        resArr: resArr,
        songArr: songArr
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
