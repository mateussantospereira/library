<h1>{{ $livro->exists ? 'Editar livro' : 'Novo livro' }}</h1>

<form method="POST" action="{{ $livro->exists ? '/livros/'.$livro->id : '/livros' }}">
    @csrf
    @if ($livro->exists)
        @method('PUT')
    @endif

    <p>
        Título:<br>
        <input name="titulo" value="{{ old('titulo', $livro->titulo) }}">
        @error('titulo') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>
        Autor:<br>
        <input name="autor" value="{{ old('autor', $livro->autor) }}">
        @error('autor') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <button>Salvar</button>
</form>

<a href="/livros">Voltar</a>
