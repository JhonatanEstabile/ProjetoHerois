@extends('layout.app',["current" => "manual"])

@section('body')
	<div class="row">
        <div class="card text-center">
            <div class="card-header">
                Primeiros Passos
            </div>
            <div class="card-body">
                <h5 class="card-title">Cadastros</h5>
                <p>
                    Olá, primeiramente quero lhe agradecer por usar nosso sistema para registrar os heróis da 
                    sua guilda, agora vamos falar um pouco sobre como usar o sistema de heróis.  
                </p>
                <p> Os procedimento iniciais serão registrar as classes e as especialidades que serão usadas 
                para completar os registros dos seus bravos guerreiros, você consegue acessar essas páginas pelo atalho
                na tela inicial do projeto através do link que fica dentro dos cards escuros, essas cartas servem para mostrar a contagem de cada
                tipo de registro que você tem no sistema, também será possivel acessar as telas de cadastros entrando dentro das páginas de listagem 
                 que são acessiveis através da barra de navegação em seus respectivos itens.</p>

                 <p>Ao chegar na interface de listagem, caso não tenha nenhum registro você verá apenas os botões de cadastro, clicando 
                 o navegador será redirecionado diretamente para os formulários de cadastros, 
                 os formulários de classes e especialidades contam apenas com um campo, este serve para registrar seus nomes,
                 depois de digitar basta clicar em salvar e você será redirecionado para a tela de listagem, agora esta contará com o registro que 
                 acabou de criar.</p>
            </div>
        </div>
	</div>

    <div class="row">
        <div class="card text-center">
            <div class="card-header">
                Listagem
            </div>
            <div class="card-body">
                <h5 class="card-title">Editar/Apagar</h5>
                <p>
                    Agora que já incluiu um registro conseguirá velo na tabela de listagem do tipo item que você cadastrou,  
                    na ultima coluna da tabela (coluna "ações") tem dois botões em todas as linhas, um deles esta escrito editar e o outro apagar.
                    Clicando no botão editar você será levado para um formulário com os dados do item no qual voce clicou para editar, ao terminar de modificá-lo basta clicar em salvar e novamente será
                    redirecionado para a tela de listagem. O botão apagar irá deletar o registro no qual está o botão que você clicou, mas atenção, esse item 
                    somente será apagado caso ele não esteja relacionado com nenhum registro de heróis.
                </p>
            </div>
        </div>
	</div>

    <div class="row">
        <div class="card text-center">
            <div class="card-header">
                Cards dos Heróis
            </div>
            <div class="card-body">
                <h5 class="card-title">Heróis</h5>
                <p>
                    Após cadastrar as especialidades e classes você finalmente conseguirá registrar os heróis, esse item funciona da mesma maneira 
                    que os outros dois, a grande diferença será a presença dos cards com os dados e imagem que você enviou, esses cards aparecerão tanto na tela de heróis 
                    quanto na tela inicial do sistema, na tela de heróis estes ficarão logo abaixo da tabela de registros.
                </p>
            </div>
        </div>
	</div>
@endsection