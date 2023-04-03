<x-layout pageTitle="Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Registre-se
        </a>
    </x-slot:btn>
    Login
    <a href="{{ route('home') }}" class="btn btn-primary">
        Ir menu
    </a>
</x-layout>
