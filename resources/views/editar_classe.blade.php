<!-- Chama o layout base da aplicação -->
@extends('layout.app', ["current" => "classes"])

<!--Define o conteudo do main no layout-->
@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/classes/{{$classe->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_classe">Nome da Classe</label>
                <input type="text" class="form-control" name="nome_classe" value="{{$classe->nome}}"
                       id="nome_classe" placeholder="Categoria">
            </div>
            <input type="hidden" name="_method" value="put">
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </div>
</div>

@endsection