$(document).ready(function (){
    $("#res_date").prop("readonly", true);
    let today = new Date();
    let minDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    let maxDate = today.setDate(today.getDate() + 7);
    let pickedPlace = {};
    let responseObject = {};
    let tableID, tableMax;
    if($('.airdatepicker')) {
        $.ajax({
            url: '/reserve-all',
            type: "GET",
            dataType: "json",
            success:function(response) {
                console.log(response);
            }
        });
    }
    // function getData() {
    //     let curYear, curMonth, curDay, curHour, curMin, finalString;
    //     $('.xdsoft_current').each(function() {
    //         if($(this).attr('data-year')) {
    //             curYear = $(this).attr('data-year')
    //         }
    //         if($(this).attr('data-month')) {
    //             curMonth = $(this).attr('data-month')
    //         }
    //         if($(this).attr('data-date')) {
    //             curDay = $(this).attr('data-date')
    //         }
    //         if($(this).attr('data-hour')) {
    //             curHour = $(this).attr('data-hour')
    //         }
    //         if($(this).attr('data-minute')) {
    //             if($(this).attr('data-minute') == 0) {
    //                 curMin = `${$(this).attr('data-minute')}0`
    //             } else {
    //                 curMin = $(this).attr('data-minute')
    //             }
    //         }
    //     })
    //     finalString = `${curYear}/${curMonth}/${curDay} ${curHour}:${curMin}`
    //     console.log(finalString);
    // }
    $.datetimepicker.setLocale('ru');
    $('.airdatepicker').datetimepicker({
        lang: 'ru',
        i18n: {
            ru: {
                months: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                dayOfWeekShort: ["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],
                dayOfWeek: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"]
            }
        },
        defaultTime: '00:00',
        step: 30,
        minDate: minDate,
        maxDate: maxDate,
        disabledWeekDays: [1],
        allowTimes:[
            '00:00', '00:30', '01:00', '01:30', '15:00', '15:30', '16:00',
            '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00',
            '20:30', '21:00', '21:30', '22:00', '22:30', '23:00', '23:30'
        ],
        onChangeDateTime() {
            pickedPlace = {
                res_date: $('#res_date').val(),
                table_id: parseInt(tableID)
            }
            let same = false;
            $.each(responseObject, function (key, value){
                if(pickedPlace.res_date === value.res_date && pickedPlace.table_id === value.table_id) {
                    same = true;
                    return false;
                }
            });
            if($('#res_date').val() !== '' && !same) {
                if($('#guest_number').val() !== '') {
                    $('.submit-reserve').removeClass('hidden');
                }
                $('.reserve-err').addClass('hidden');
            } else {
                $('.reserve-err').removeClass('hidden');
                $('.submit-reserve').addClass('hidden');
            }
        }
    });
    $('#modal').on('input', function () {
        if($('#guest_number').val() != '' && parseInt($('#guest_number').val()) <= parseInt(tableMax) && $('#guest_number').val() != 0) {
            $('.res_date').removeClass('hidden');
        } else {
            $('.res_date').addClass('hidden');
            $('.submit-reserve').addClass('hidden');
        }
    });
    $('.add-reservation').click(function (e){
        $.ajax({
            url: '/reserve-all',
            type: "GET",
            dataType: "json",
            success:function(response) {
                pickedPlace = {};
                responseObject = response;
            }
        });
        $('#modal').toggleClass('hidden');
        $('.submit-reserve').toggleClass('hidden')
        tableID = $(this).attr('data-table');
        tableMax = $(this).attr('data-max');
        $('.table-id').val(tableID);
        $('#guest_number').attr('max', tableMax);
        $('.num-span').html(`Максимально допустимое кол-во для данного стола - ${tableMax}`);
    });
    $('.close-button').click(function (e){
        $('#modal').toggleClass('hidden');
        $('#res_date').val('');
    });
    $('.table-blocked').click(function (e){
        Swal.fire({
            icon: 'error',
            title: 'Ошибка',
            text: 'Стол недоступен! Выберите свободный стол'
        });
    });
});
