$(document).ready(function (){
    $('.add-to-cart').click(function (e){
        e.preventDefault();

        let menu_id = $(this).closest('.menu_data').find('.menu_id').val();
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
                'menu_qty': menu_qty
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
                    Swal.fire(
                        'Успешно!',
                        'Блюдо добавлено в корзину!',
                        'success'
                    )
                } else if(response.status === 'exists') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ошибка',
                        text: 'Блюдо уже есть в корзине!'
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
    $(".cart-body").on('change', 'input.menu_qty', function () {
        let menu_price = $(this).closest(".cart-item").find('.menu_init_price').val();
        $(this).closest(".cart-item").find('.menu_price').html(menu_price * $(this).val());
        console.log(menu_price);
        console.log($(this).closest(".cart-item").find('.menu_price'));
    });
});
