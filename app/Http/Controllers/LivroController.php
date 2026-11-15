<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.form', ['livro' => new Livro()]);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
        ]);

        Livro::create($dados);
        return redirect('/livros');
    }

    public function edit(Livro $livro)
    {
        return view('livros.form', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $dados = $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
        ]);

        $livro->update($dados);
        return redirect('/livros');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect('/livros');
    }
}
