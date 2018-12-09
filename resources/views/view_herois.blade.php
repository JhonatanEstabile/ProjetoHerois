@extends('layout.app', ["current" => "herois"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Heróis</h5>

@if(count($cats) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Herói</th>
                    <th>Classe</th>
                    <th>Especialidades</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($cats as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nome}}</td>
                    <td>{{$cat->classe->nome}}</td>
                    <td>@foreach($cat->especialidade as $especialidade)
                            {{$especialidade->nome}}; 
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="/herois/{{$cat->id}}/edit" class="btn btn-sm btn-outline-primary">Editar</a>
                            <form method="post" action="/herois/{{$cat->id}}">
                                @csrf
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
        <a href="/herois/create" class="btn btn-sm btn-primary" role="button">Cadastrar herói</a>
    </div>
</div>

@endsection

@section('cards_herois')
<div class="row" style="margin-top:25px;">
	@foreach($cats as $cat)
        @component('component.card', ['heroi' => $cat])
        @endcomponent
	@endforeach
</div>
@endsection