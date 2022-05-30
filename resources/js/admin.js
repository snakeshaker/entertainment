$(document).ready(function (){
    $(".admin-table").on('click', "#destroy_entry", function (event) {
        event.preventDefault();
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
                    event.target.parentElement.submit();
                });
            }
        })
    });
    $(".admin-table").on('click', "#payment_update", function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Вы уверены?',
            text: "Убедитесь что платеж прошёл!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Отмена',
            confirmButtonText: 'Да, всё оплачено!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Обновлено!',
                    'Статус успешно обновлен!',
                    'success'
                ).then(function () {
                    event.target.parentElement.submit();
                });
            }
        })
    });
});
