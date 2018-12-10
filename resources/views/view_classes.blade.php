@extends('layout.app', ["current" => "classes"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Classes</h5>
        @if(session()->get('error') != null)
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif

@if(count($classes) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Classe</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($classes as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nome}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/classes/{{$cat->id}}/edit" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form method="post" action="/classes/{{$cat->id}}">
                                @csrf
                                <!--Mini formulario apenas para passar o metodo delete pelo post junto com o id do registro-->
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                            </form>
                        </div>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="/classes/create" class="btn btn-sm btn-primary" role="button">Cadastrar classe</a>
    </div>
</div>

@endsection