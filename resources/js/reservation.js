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
        }
    });
    $('.add-reservation').click(function (e){
        Swal.fire({
            title: 'Забронировать место',
            html: `<form method="POST" action="{{ route('admin.reservations.store') }}">
                        <input type="number" id="user_id" name="user_id" value="1" class="hidden">
                        <div class="sm:col-span-6">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
                            <div class="mt-1">
                                <input type="text" id="first_name" name="first_name" class="@error('first_name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Фамилия</label>
                            <div class="mt-1">
                                <input type="text" id="last_name" name="last_name" class="@error('last_name') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Электронная почта</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email" class="@error('email') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Номер телефона</label>
                            <div class="mt-1">
                                <input type="text" id="tel_number" name="tel_number" class="@error('tel_number') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Дата бронирования</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="res_date" name="res_date"
                                       min="{{ $min_date->format('Y-m-d\\TH:i:s') }}"
                                       max="{{ $max_date->format('Y-m-d\\TH:i:s') }}"
                                       class="@error('res_date') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            <span class="text-xs">Пожалуйста выберите время с 15:00 до 00:00.</span>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700">Число гостей</label>
                            <div class="mt-1">
                                <input type="number" id="guest_number" name="guest_number"
                                       class="@error('guest_number') border-red-400 @enderror block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 pt-5">
                            <label for="table_id" class="block text-sm font-medium text-gray-700">Место</label>
                            <div class="mt-1">
                                <select id="table_id" name="table_id" class="@error('table_id') border-red-400 @enderror form-multiselect block w-full mt-1">
                                    @foreach($tables as $table)
                                        <option value="{{ $table->id }}">
                                            {{ $table->name }} ({{ $table->guest_number }} гость(-я/ей) максимум)
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                                Забронировать
                            </button>
                        </div>
                    </form>`,
            focusConfirm: false,
            preConfirm: () => {
                const login = Swal.getPopup().querySelector('#login').value
                const password = Swal.getPopup().querySelector('#password').value
                if (!login || !password) {
                    Swal.showValidationMessage(`Please enter login and password`)
                }
                return { login: login, password: password }
            }
        }).then((result) => {
            Swal.fire(`
            Login: ${result.value.login}
            Password: ${result.value.password}
          `.trim())
        })
    });
});
