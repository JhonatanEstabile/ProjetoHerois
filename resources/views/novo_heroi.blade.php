@extends('layout.app', ["current" => "herois"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/herois" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Nome:</label>
                    <input type="text" class="form-control" name="nome" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_classe">Classe</label>
                    <select id="input_classe" class="form-control" name="classe" required>
                        @foreach($cats_classe as $c)
                        <option value="{{$c->id}}">{{$c->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="input_espec">Especialidades</label>
                    <select id="input_espec" class="form-control" multiple size="3" name="especialidade[]" required>
                        @foreach($cats_espec as $ce)
                        <option value="{{$ce->id}}">{{$ce->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="input_vida">Vida</label>
                    <input type="number" class="form-control" id="input_vida" name="vida" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="input_defesa">Defesa</label>
                    <input type="number" class="form-control" id="input_defesa" name="defesa" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="input_dabo">Dano:</label>
                    <input type="number" class="form-control" id="input_dano" name="dano" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_vel_atq">Velocidade de ataque</label>
                    <input type="number" step="0.01" class="form-control" id="input_vel_atq" name="vel_atq" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="input_vel_mov">Velocidade de Movimento:</label>
                    <input type="number" class="form-control" id="input_vel_mov" name="vel_mov" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 col-offset-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="arquivo" name="arquivo" required>
                        <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar herói</button>
            <a class="btn btn-danger" href="/herois">Cancelar<a>
        </form>
    </div>
</div>

@endsection