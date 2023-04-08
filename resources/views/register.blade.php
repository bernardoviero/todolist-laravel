<x-layout pageTitle="Login">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Registrar-se</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.register_action') }}">
            @csrf

            <x-form.text-input name="name" label="Seu Nome" required="required" placeholder="Digite seu Nome"
                type="text" />

            <x-form.text-input name="email" label="Seu Email" required="required" placeholder="Digite seu Email"
                type="email" />

            <x-form.text-input name="password" label="Sua Senha" required placeholder="Digite sua Senha"
                type="password" />

            <x-form.text-input name="password_confirmation" label="Confirme sua Senha" required
                placeholder="Confirme sua Senha" type="password" />

            <x-form.form-button resetText="Limpar" submitText="Registrar-se" />

        </form>
    </section>
</x-layout>
