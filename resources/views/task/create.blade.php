<x-layout pageTitle="Login">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="create_task_section">
        <h1>Criar tarefa</h1>
        <form method="POST" action="{{ route('task.create_action') }}">
            @csrf

            <x-form.text-input name="title" label="Titulo da Tarefa" required="required"
                placeholder="Digite um Titulo para a Tarefa" type="text" />

            <x-form.text-input name="due_date" label="Data da Tarefa" required="required"
                placeholder="Digite uma data para a Tarefa" type="date" />

            <x-form.select-input name="category_id" label="Categoria" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.text-area-input name="description" label="Descrição"
                placeholder="Digite uma Descrição para essa Tarefa" />

            <x-form.form-button resetText="Resetar" submitText="Criar tarefa" />

        </form>
    </section>
</x-layout>
