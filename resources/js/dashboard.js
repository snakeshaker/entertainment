$(document).ready(function (){
    $(".user-card").on('click', "#destroy_entry", function (event) {
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
});
