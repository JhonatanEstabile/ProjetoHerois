@extends('layout.app' ["current" => "herois"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/herois/{{$cat->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{$cat->nome}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_classe">Classe</label>
                    <select id="input_classe" class="form-control" name="classe">
                        @foreach($cats_classe as $c)
                        <option value="{{$c->id}}" @if($c->id == $cat->classe_id) selected @endif >{{$c->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="input_classe">Especialidades</label>
                    <select id="input_classe" class="form-control" multiple size="3" name="especialidades[]">
                        @foreach($cats_espec as $ce)
                            <option value="{{$ce->id}}" @if(in_array($ce->id, $especialidades_array)) selected @endif>{{$ce->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="input_vida">Vida</label>
                    <input type="text" class="form-control" id="input_vida" name="vida" value="{{$cat->vida}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="input_defesa">Defesa</label>
                    <input type="text" class="form-control" id="input_defesa" name="defesa" value="{{$cat->defesa}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="input_dabo">Dano:</label>
                    <input type="text" class="form-control" id="input_dano" name="dano" value="{{$cat->dano}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_vel_atq">Velocidade de ataque</label>
                    <input type="text" class="form-control" id="input_vel_atq" name="vel_atq" value="{{$cat->vel_atq}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input_vel_mov">Velocidade de Movimento:</label>
                    <input type="text" class="form-control" id="input_vel_mov" name="vel_mov" value="{{$cat->vel_mov}}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 col-offset-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
                        <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                    </div>
                </div>
            </div>
            <br>

            <input type="hidden" name="_method" value="put">
            <button type="submit" class="btn btn-primary">Atualizar cadastro do herói</button>
        </form>
    </div>
</div>

@endsection