		<div class="col-md-4">
			<div class="card border-danger mb-3" style="max-width: 18rem; height:340px;">
				<div class="card-header">{{$heroi->nome}} <img src="{{asset('storage/'.$heroi->foto_heroi)}}"></div>

				<div class="card-body text-primary">
					<h5 class="card-title">Classe: {{$heroi->classe->nome}}</h5>
					<p class="card-text">
						<ul>
							<li>Especialidades: 
								@foreach($heroi->especialidade as $especialidade)
									{{$especialidade->nome}}; 
								@endforeach
							</li>
							<li>
								Vida: {{$heroi->vida}}
							</li>
							<li>
								Defesa: {{$heroi->defesa}}
							</li>
							<li>
								Dano: {{$heroi->dano}}
							</li>
							<li>
								Velocidade de ataque: {{$heroi->vel_atq}}
							</li>
							<li>
								Velocidade de movimento: {{$heroi->vel_mov}}
							</li>
						</ul>
					</p>
				</div>
			</div>
		</div>