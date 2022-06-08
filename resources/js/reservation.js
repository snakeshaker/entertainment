import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';

$(document).ready(function (){
    $("#res_date").prop("readonly", true);
    let today = new Date();
    let minDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    let maxDate = today.setDate(today.getDate() + 7);
    let pickedPlace = {};
    let responseObject = {};
    let tableID;
    new AirDatepicker('.airdatepicker', {
        timepicker: true,
        minDate: minDate,
        maxDate: maxDate,
        minHours: 15,
        minutesStep: 30,
        startDate: minDate,
        onRenderCell({date, cellType}) {
            if (cellType === 'day') {
                if (date.getDay() === 1) {
                    return {
                        disabled: true
                    }
                }
            }
        },
        onSelect({date}) {
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
                $('.reserve-err').addClass('hidden');
                $('.submit-reserve').removeClass('hidden');
            } else {
                $('.reserve-err').removeClass('hidden');
                $('.submit-reserve').addClass('hidden');
            }
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
        let tableMax = $(this).attr('data-max');
        $('.table-id').val(tableID);
        $('#guest_number').attr('max', tableMax);
        $('.num-span').html(`Максимально допустимое кол-во для данного стола - ${tableMax}`);
    });
    $('.close-button').click(function (e){
        $('#modal').toggleClass('hidden');
    });
    $('.table-pending').click(function (e){
        Swal.fire({
            icon: 'error',
            title: 'Ошибка',
            text: 'Стол в режиме ожидания! Выберите свободный стол'
        });
    });
    $('.table-blocked').click(function (e){
        Swal.fire({
            icon: 'error',
            title: 'Ошибка',
            text: 'Стол занят! Выберите свободный стол'
        });
    });
});
