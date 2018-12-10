@extends('layout.app', ["current" => "herois"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Heróis</h5>
        <div class="row">
            <div class="col-md-6">
                <form class="form-group">
                    <select id="classe_heroi" class="form-control">
                        <option value="-1">Todas as classes</option>
                        @foreach($cats_classe as $classe)
                            <option value="{{$classe->id}}">{{$classe->nome}}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="col-md-6">
                <form class="form-group">
                    <select id="especs_heroi" class="form-control">
                        <option value="-1">Todas as especialidades</option>
                        @foreach($cats_espec as $espec)
                            <option value="{{$espec->id}}"  @if(isset($id)) @if($id == $espec->id) selected @endif @endif>{{$espec->nome}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

@if(count($cats->heroi) > 0)
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
    @foreach($cats->heroi as $cat)
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
        <a href="/herois/create" class="btn btn-sm btn-primary" role="button">Cadastrar herói</a>
    </div>
</div>

@endsection

@section('cards_herois')
<div class="row" style="margin-top:25px;">
	@foreach($cats->heroi as $cat)
        @component('component.card', ['heroi' => $cat])
        @endcomponent
	@endforeach
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $('#classe_heroi').on('change', function() {
        window.location.replace("/herois/filtro_classe/"+this.value);
    });

    $('#especs_heroi').on('change', function() {
        window.location.replace("/herois/filtro_especialidade/"+this.value);
    });
</script>
@endsection