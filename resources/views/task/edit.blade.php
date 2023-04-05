<x-layout pageTitle="Login">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Editar tarefa</h1>
        <form method="POST" action="{{ route('task.edit_action') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $task->id }}" />
            <x-form.text-input name="title" label="Titulo da Tarefa" required="required"
                placeholder="Digite um Titulo para a Tarefa" type="text" value="{{ $task->title }}" />

            <x-form.text-input name="due_date" label="Data da Tarefa" required="required"
                placeholder="Digite uma data para a Tarefa" type="datetime-local" value="{{ $task->due_date }}" />

            <x-form.select-input name="category_id" label="Categoria" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $task->category_id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select-input>

            <x-form.text-area-input name="description" label="Descrição"
                placeholder="Digite uma Descrição para essa Tarefa" value="{{ $task->description }}" />

            <x-form.form-button resetText="Resetar" submitText="Atualizar tarefa" />

        </form>
    </section>
</x-layout>
