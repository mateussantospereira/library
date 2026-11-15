<?php


use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/livros');

Route::resource('livros', LivroController::class)->except('show');

Route::get('/emprestimos', [EmprestimoController::class, 'index']);
Route::get('/emprestimos/novo', [EmprestimoController::class, 'create']);
Route::post('/emprestimos', [EmprestimoController::class, 'store']);
Route::patch('/emprestimos/{emprestimo}/devolver', [EmprestimoController::class, 'devolver']);
