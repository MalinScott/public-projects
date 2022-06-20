<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 ">
            <x-card>
                <h1 class="text-center font-bold text-xl"> Log In!</h1>
                <form class="mt-10" method="POST" action="/login">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>

                    <x-form.submit-button>Log In</x-form.submit-button>
                    {{--                @if($errors->any())
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li class="text-red-500 text-xs">{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    @endif--}}
                </form>
            </x-card>

        </main>
    </section>
</x-layout>
