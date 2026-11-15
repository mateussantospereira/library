<h1>Livros</h1>

<a href="/livros/create">Novo livro</a> |
<a href="/emprestimos">Ver empréstimos</a>

<table border="1" cellpadding="5">
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>

    @foreach ($livros as $livro)
        <tr>
            <td>{{ $livro->titulo }}</td>
            <td>{{ $livro->autor }}</td>
            <td>{{ $livro->disponivel() ? 'Disponível' : 'Emprestado' }}</td>
            <td>
                <a href="/livros/{{ $livro->id }}/edit">Editar</a>

                <form action="/livros/{{ $livro->id }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button>Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
