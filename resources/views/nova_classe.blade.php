@extends('layout.app', ["current" => "classes"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/classes" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeCategoria">Nome da Categoria</label>
                <input type="text" class="form-control" name="nome_classe" 
                       id="nome_classe" placeholder="Nome da Classe" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <a class="btn btn-danger btn-sm" href="/classes">Cancelar<a>
        </form>
    </div>
</div>

@endsection