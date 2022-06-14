<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <h2 class="text-center text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Контактные данные</h2>
        <div class="container container max-w-4xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-start mt-5">
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="{{ asset('assets/location.svg') }}">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Наш адрес</div>
                        <p class="text-grey-darker text-base">{{ $contact->address }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row-reverse rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="{{ asset('assets/phone.svg') }}">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Номер телефона</div>
                        <p class="text-grey-darker text-base">{{ $contact->number }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row-reverse rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="{{ asset('assets/email.svg') }}">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">Почта</div>
                        <p class="text-grey-darker text-base">{{ $contact->email }}</p>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 p-3">
                <div class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg items-center">
                    <img class="block w-full lg:w-48 flex-none bg-cover h-24" src="{{ asset('assets/clock.svg') }}">
                    <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="text-black font-bold text-xl mb-2 leading-tight">График работы</div>
                        <p class="text-grey-darker text-base w-[10em]">{{ $contact->time }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
