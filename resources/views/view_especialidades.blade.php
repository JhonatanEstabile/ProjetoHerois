@extends('layout.app', ["current" => "especialidades"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Especialidades</h5>
        
        <!-- Verifica se foi retornado algum erro, caso tenha mostra para o usuário -->
        @if(session()->get('error') != null)
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif
@if(count($cats) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nome}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/especialidades/{{$cat->id}}/edit" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form method="post" action="/especialidades/{{$cat->id}}">
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
        <a href="/especialidades/create" class="btn btn-sm btn-primary" role="button">Cadastrar especialidade</a>
    </div>
</div>

@endsection