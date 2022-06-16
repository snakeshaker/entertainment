$(document).ready(function (){
    $('.add-to-cart').click(function (e){
        e.preventDefault();

        let menu_id = $(this).closest('.menu_data').find('.menu_id').val();
        let song_id = $(this).closest('.music_data').find('.song_id').val();
        let res_id = $(this).closest('#modal').find('#table_id').val();
        let res_date = $(this).closest('#modal').find('#res_date').val();
        let guest_number = $(this).closest('#modal').find('#guest_number').val();
        let menu_qty = 1;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'menu_id': menu_id,
                'song_id': song_id,
                'res_id': res_id,
                'res_date': res_date,
                'menu_qty': menu_qty,
                'guest_number': guest_number
            },
            statusCode: {
                401: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Авторизируйтесь чтобы продолжить!',
                        footer: '<a href="/login">Войти</a>'
                    })
                }
            },
            success: function (response) {
                if(response.status === 'success') {
                    $('#modal').addClass('hidden');
                    Swal.fire(
                        'Успешно!',
                        'Добавлено в корзину!',
                        'success'
                    )
                } else if(response.status === 'exists') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Уже есть в корзине!'
                    })
                }
            }
        });
    });
    $('.delete-all').click(function (e){
        e.preventDefault();
        Swal.fire({
            title: 'Вы уверены?',
            text: "Все данные будут утеряны!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Отмена',
            confirmButtonText: 'Да, удалить!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Удалено!',
                    'Запись успешно удалена.',
                    'success'
                ).then(function () {
                    window.location.href = "cart/create";
                });
            }
        })
    });

    let init = 0;
    $('.menu_price:visible').each(function(){
        init += parseFloat($(this).text());
    });
    $('.cart-total').html(init);
    $('#total').val(init);
    $(".cart-body").on('change', 'input.menu_qty', function () {
        let menu_price = $(this).closest(".cart-item").find('.menu_init_price').val();
        $(this).closest(".cart-item").find('.menu_price').html(menu_price * $(this).val());

        let sum = 0;
        $('.menu_price').each(function(){
            sum += parseFloat($(this).text());
        });
        $('.cart-total').html(sum);
        $('#total').val(sum);
    });
    $('#dostavka').click(function() {
        if( $('#dostavka').is(':checked') ){
            $('.dostavka-checked').toggleClass('hidden');
            $('.payment-radio').toggleClass('hidden');
            $('.nedostavka').toggleClass('hidden');
            $("#pay-dostavka").prop("checked", true).change();
            let init = 0;
            $('.menu_price:visible').each(function(){
                init += parseFloat($(this).text());
            });
            $('.cart-total').html(init);
            $('#total').val(init);
        }
        else{
            $('.nedostavka').toggleClass('hidden');
            $('.dostavka-checked').toggleClass('hidden');
            $('.payment-radio').toggleClass('hidden');
            $("#pay-dostavka").prop("checked", false).change();
            let init = 0;
            $('.menu_price:visible').each(function(){
                init += parseFloat($(this).text());
            });
            $('.cart-total').html(init);
            $('#total').val(init);
        }
    });
});
