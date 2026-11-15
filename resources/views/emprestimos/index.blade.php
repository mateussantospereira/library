<h1>Empréstimos</h1>

<a href="/emprestimos/novo">Novo empréstimo</a> |
<a href="/livros">Ver livros</a>

<table border="1" cellpadding="5">
    <tr>
        <th>Livro</th>
        <th>Leitor</th>
        <th>Situação</th>
        <th></th>
    </tr>

    @foreach ($emprestimos as $emprestimo)
        <tr>
            <td>{{ $emprestimo->livro->titulo }}</td>
            <td>{{ $emprestimo->leitor }}</td>
            <td>{{ $emprestimo->devolvido ? 'Devolvido' : 'Em aberto' }}</td>
            <td>
                @if (!$emprestimo->devolvido)
                    <form action="/emprestimos/{{ $emprestimo->id }}/devolver" method="POST">
                        @csrf
                        @method('PATCH')
                        <button>Devolver</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
</table>
