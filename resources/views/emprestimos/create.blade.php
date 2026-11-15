<h1>Novo empréstimo</h1>

<form method="POST" action="/emprestimos">
    @csrf

    <p>
        Livro:<br>
        <select name="livro_id">
            @foreach ($livros as $livro)
                <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
            @endforeach
        </select>
        @error('livro_id') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        Nome do leitor:<br>
        <input name="leitor" value="{{ old('leitor') }}">
        @error('leitor') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <button>Registrar</button>
</form>

<a href="/emprestimos">Voltar</a>
