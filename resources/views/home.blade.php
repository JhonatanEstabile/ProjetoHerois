@extends('layout.app',["current" => "inicio"])

@section('body')
		<div class="row">

			<div class="col-md-4">
				@component('component.card_inicio', ['tipo' => 'Classes', 'quantidade' => $classe, 'rota'=>'/classes/create'])
				@endcomponent
			</div>

			<div class="col-md-4">
				@component('component.card_inicio', ['tipo' => 'Especialidades', 'quantidade' => $especialidade, 'rota'=>'/especialidades/create'])
				@endcomponent
			</div>

			<div class="col-md-4">
				@component('component.card_inicio',['tipo' => 'Heróis', 'quantidade' => count($heroi), 'rota'=>'/herois/create'])
				@endcomponent
			</div>

		</div>
@endsection

@section('cards_herois')
<div class="row" style="margin-top:25px;">
	@foreach($heroi as $cat)
        @component('component.card', ['heroi' => $cat])
        @endcomponent
	@endforeach
</div>
@endsection
