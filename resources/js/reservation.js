import AirDatepicker from 'air-datepicker';
import 'air-datepicker/air-datepicker.css';

$(document).ready(function (){
    $("#res_date").prop("readonly", true);
    let today = new Date();
    let minDate = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    let maxDate = today.setDate(today.getDate() + 7);
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
            if($('#res_date').val() !== '') {
                $('.submit-reserve').removeClass('hidden');
            }
        }
    });
    $('.add-reservation').click(function (e){
        $('#modal').toggleClass('hidden');
        $('.submit-reserve').toggleClass('hidden')
        let tableID = $(this).attr('data-table');
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
