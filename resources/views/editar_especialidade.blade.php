<!--Chama o layout- principal e passa por paramentro a pagina atual-->
@extends('layout.app', ["current" => "especialidades"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/especialidades/{{$cat->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_espec">Nome da Especialidade</label>
                <input type="text" class="form-control" name="nome_espec" 
                       id="nome_espec" placeholder="Nome da Especialidade" value="{{$cat->nome}}">
            </div>
            <input type="hidden" name="_method" value="put">
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection