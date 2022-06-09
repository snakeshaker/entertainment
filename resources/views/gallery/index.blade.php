<x-guest-layout>
    <section class="px-2 py-10 bg-white md:px-0">
        <h2 class="text-center text-4xl xl:text-5xl text-transparent bg-clip-text bg-gradient-to-b from-green-400 to-blue-500 hover:text-green-400">Фотогалерея</h2>
        <div class="container container max-w-4xl m-auto flex flex-wrap flex-col md:flex-row items-center justify-center mt-5 px-5">
            <div class="container grid md:grid-cols-3 grid-cols-1 gap-3">
                @foreach($photos as $photo)
                    <div class="bg-white rounded-lg w-full">
                        <img src="{{ asset('assets/'.$photo->image) }}" alt="" class="rounded-t-lg" data-action="zoom">
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4 w-full">
                {!! $photos->links() !!}
            </div>
        </div>
    </section>
</x-guest-layout>
