## Sistema de heróis 

    Baixe os arquivos desse projeto e instale em seu servidor apache, para o pleno funcionamento do projeto crie um banco de dados de preferencia no **mySql** ou **mariaDB** com o **nome : crud_herois usuario:root** e **sem senha**, caso queira criar um banco com um nome de usuário e senha diferente do sugerido, essas informações precisarão ser mudadas no arquivo .env que está localizado na raiz do projeto, os campos que precisará mudar são:

- [DB_CONNECTION=mysql]
- [DB_HOST=127.0.0.1]
- [DB_PORT=3306]
- [DB_DATABASE=crud_herois]
- [DB_USERNAME=root]
- [DB_PASSWORD=]

## Passo inicial

   O primeiro passo é a criação das tabelas do projeto no banco de dados, para fazer isso abra o prompt de comando e vá até a pasta do projeto, dentro da mesma execute o comando: **php artisan migrate** Após executar esse comando as tabelas necessárias para o funcionamento do projeto serão criadas. Também existem dois arquivos seeders para registrar alguns dados nas tabelas classes e especialidades, caso queira que seja feito esse preenchimento inicial, ainda na pasta do projeto no prompt de comando execute o seginte comando: **php artisan db:seed** .

## Acessando a aplicação
   Caso queira rodar a aplicação localmente, você pode usar o prompt de comando para inicializar o servidor local. Para isso navegue usando o prompt até a pasta do projeto e execute o comando: **php artisan serve** em seguida o servidor será inicializado e o
sistema poderá ser acessado atavés do endereço localhost:8000 ou 127.0.0.1:8000 no seu navegador.

## Rotas para acesso da API

para pegar todos os dados das tabelas pela api basta usar o metodo http **GET** nas rotas:
- [/api/classes]
- [/api/especialidades]
- [/api/herois]

para pegar os dados de um registro específico das tabelas usando a api, 
necessita apenas usar o método **GET** nas rotas **"/"** o número do **id** do registro que quer pegar :

- [/api/classes/{{id}}]
- [/api/especialidades/{{id}}]
- [/api/herois/{{id}}]

para inserir um novo registro nas tabelas usando a api 
envie um **POST** nas seguintes rotas com os seguintes campos:

Rota: /api/classes
campos: **nome** (tipo string)

Exemplo:
post para localhost:8000/api/classes campos do formulario Name="nome" value="Mago"

Rota: /api/especialidades
campos: **nome** (tipo string)

exemplo:
post para localhost:8000/api/especialidades campos do formulario Name="nome" value="Ataque a distância"

Rota: /api/herois
campos:
- [**nome** (tipo string);]
- [**vida** (tipo integer);]
- [**dano** (tipo integer);]
- [**defesa** (tipo integer);]
- [**vel_atq** (tipo double);]
- [**vel_mov** (tipo integer);]
- [**classe** (tipo integer);]
- [**especialidade[]** (tipo integer) pode colocar quantos campos desse quiser]
- [**arquivo** (tipo file) campo para enviar a foto que será usada como thumbnail no cadastro do herói]

para atualizar os dados de um registro especifico das tabelas pela api 
basta usar o método **PUT** para enviar os dados nas seguintes rotas passando **"/"** o numero do **id** do registro que quer atualizar :

- [/api/classes/{{id}}]
campos:**nome** (tipo string)

- [/api/especialidades/{{id}}]
campos:**nome** (tipo string)

- [/api/herois/{{id}}]
campos:
- [**nome** (tipo string);]
- [**vida** (tipo integer);]
- [**dano** (tipo integer);]
- [**defesa** (tipo integer);]
- [**vel_atq** (tipo double);]
- [**vel_mov** (tipo integer);]
- [**classe** (tipo integer);]
- [**especialidade[]** (tipo integer) pode colocar quantos campos desse quiser]
- [**arquivo** (tipo file) campo **não obrigatório**]

A exclusão é feita por meio do metodo http delete passando pela url o id do registro que quer apagar:

- [/api/classes/{{id}}]
- [/api/especialidades/{{id}}]
- [/api/herois/{{id}}]
