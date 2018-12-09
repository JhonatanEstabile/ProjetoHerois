@extends('layout.app', ["current" => "especialidades"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/especialidades" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_espec">Nome da Especialidade</label>
                <input type="text" class="form-control" name="nome_espec" 
                       id="nome_espec" placeholder="Nome da Especialidade" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection