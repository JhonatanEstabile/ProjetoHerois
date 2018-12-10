## Sistema de heróis 

Baixe os arquivos desse projeto e instale em seu servidor apache, crie e configure o arquivo .env, após isso com o prompt de comando vá até a pasta do projeto e execute os seguintes comandos nas respectivas ordens:  
- **composer install**  
- **php artisan key:generate**; 
- **php artisan migrate**  
- **php artisan storage:link**  
- **npm rum**  
- **npm run dev**  
Para o pleno funcionamento do projeto crie um banco de dados de preferencia no mySQL ou mariaDB, todas as informações da conexão com o banco de dados, url do projeto, entre outras configurações básicas já deverão ter sidos configuradas no arquivo .env que você criou e que deverá estar localizado na raiz do projeto.

## Rotas para acesso da API

para pegar todos os dados das tabelas pela api basta usar o metodo get nas rotas:  
- /api/classes  
- /api/especialidades  
- /api/herois

para pegar os dados de um registro especifico das tabelas usando a api 
basta usar o método get nas rotas "/" o número do id do registro que quer pegar :  
- /api/classes/{{id}}" 
- /api/especialidades/{{id}}  
- /api/herois/{{id}}

para inserir um novo registro nas tabelas usando a api 
basta enviar um post nas seguintes rotas com os seguntes campos:  
- Rota: /api/classes  
campo: **nome** (tipo string)  
Exemplo:  
post para localhost:8000/api/classes campos do formulario Name="nome" value="Mago"

- Rota: 'api/especialidades' 
campo: **nome** (tipo string)

exemplo:  
post para localhost:8000/api/especialidades campos do formulario Name="nome" value="Ataque a distância"

- Rota: '/api/herois'  
campos:  
**nome** (tipo string);  
**vida** (tipo integer);  
**dano** (tipo integer);  
**defesa** (tipo integer);  
**vel_atq** (tipo double);  
**vel_mov** (tipo integer);  
**classe** (tipo integer);  
**especialidade[]** (tipo integer) pode colocar quantos campos desse quiser  
**foto_heroi[]** (tipo file)

para atualizar os dados de um registro específico das tabelas pela api 
basta usar o método put para enviar os dados nas seguintes rotas passando "/" o numero do id do registro que quer atualizar :  
- /api/classes/{{id}}  
campo: **nome** (tipo string)

- /api/especialidades/{{id}}  
campo: **nome** (tipo string)  

- /api/herois/{{id}}  
campos:  
**nome** (tipo string);  
**vida** (tipo integer);  
**dano** (tipo integer);  
**defesa** (tipo integer);  
**vel_atq** (tipo double);  
**vel_mov** (tipo integer);  
**classe** (tipo integer);  
**especialidade[]** (tipo integer) pode colocar quantos campos desse quiser;  
**foto_heroi** (tipo file) este campo **não é obrigatório**;

A exclusão é feita por meio do metodo http delete passando pela url o id do registro que quer apagar:

- /api/classes/{{id}}  
- /api/especialidades/{{id}}  
- /api/herois/{{id}}  

Para pegar os heróis por uma certa classe ou especialidade envie um GET com o id do atributo selecionado para as seguintes rotas  
- /api/herois/classe/{{id}}  
- /api/herois/especialidade/{{id}}
