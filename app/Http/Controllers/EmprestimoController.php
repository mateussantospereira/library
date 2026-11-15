<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with('livro')->get();
        return view('emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $livros = Livro::all()->filter(fn ($livro) => $livro->disponivel());
        return view('emprestimos.create', compact('livros'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'leitor' => 'required',
        ]);

        if (!Livro::find($dados['livro_id'])->disponivel()) {
            return back()->withErrors(['livro_id' => 'Esse livro já está emprestado.']);
        }

        Emprestimo::create($dados);
        return redirect('/emprestimos');
    }

    public function devolver(Emprestimo $emprestimo)
    {
        $emprestimo->update(['devolvido' => true]);
        return redirect('/emprestimos');
    }
}
