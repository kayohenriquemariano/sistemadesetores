📘 Documentação – Cadastro de Setores (Laravel + PostgreSQL)
🎯 Objetivo

Criar um sistema simples de cadastro de setores com:

Backend em Laravel (API REST)

Banco PostgreSQL

Frontend em Blade + JavaScript

Operações CRUD (Create, Read, Update, Delete)

🧱 1. Estrutura do Backend
✔ Model

Arquivo: app/Models/Setores.php

Responsável por representar a tabela no banco.

class Setores extends Model
{
    protected $table = 'setores';

    protected $fillable = [
        'nome'
    ];
}

👉 $fillable permite salvar dados com create().

✔ Controller

Arquivo: app/Http/Controllers/SetoresController.php

Responsável pela lógica da API.

Funções criadas:

index() → lista setores

store() → cadastra setor

update() → atualiza setor

destroy() → remove setor

A API retorna JSON, não view.

✔ Rotas da API

Arquivo: routes/api.php

Route::apiResource('setores', SetoresController::class);

Isso cria automaticamente:

Método	Rota	Função
GET	/api/setores	listar
POST	/api/setores	cadastrar
PUT	/api/setores/{id}	atualizar
DELETE	/api/setores/{id}	excluir
✔ Ajuste obrigatório no Laravel 11

Arquivo: bootstrap/app.php

Foi necessário registrar o arquivo de API manualmente:

Forma de acessar 

bootstrap> app.php

->withRouting(
    web: __DIR__.'/../routes/web.php',
    api: __DIR__.'/../routes/api.php',
    commands: __DIR__.'/../routes/console.php',
    health: '/up',
)

👉 Sem isso a API não funciona.

🎨 2. Frontend
✔ Rota da página

Arquivo: routes/web.php

Route::get('/setores', function () {
    return view('setores');
});

👉 Essa rota abre a página no navegador.

✔ View Blade

Arquivo: resources/views/setores.blade.php

A página possui:

campo para digitar nome

botão cadastrar

lista dinâmica

botões editar e excluir

✔ JavaScript do sistema

Arquivo movido para:

public/js/conexao.js

👉 Arquivos JS precisam ficar em public/ para o navegador acessar.

O JS faz:

GET → listar setores

POST → cadastrar

PUT → atualizar

DELETE → excluir

Tudo usando fetch() chamando a API.

🗄️ 3. Banco de Dados

Banco: PostgreSQL
Tabela: setores

Campos:

Campo	Tipo
id	serial
nome	varchar
created_at	timestamp
updated_at	timestamp
🔗 4. URLs do sistema
URL	Função
/setores	abre a página
/api/setores	lista setores
POST /api/setores	cadastra
PUT /api/setores/{id}	atualiza
DELETE /api/setores/{id}	exclui
🧠 5. Conceitos importantes aprendidos
✔ Diferença entre web.php e api.php
Arquivo	Uso
web.php	páginas Blade
api.php	JSON / API
✔ Pasta public

Só arquivos dentro de public/ podem ser acessados pelo navegador.

✔ Laravel 11 mudou o carregamento de rotas

API precisa ser registrada manualmente no bootstrap.

✔ API retorna JSON

Frontend consome via JavaScript (fetch).

🚀 Resultado final

Sistema funcional com:

API REST

PostgreSQL conectado

CRUD completo

Página dinâmica

Atualização em tempo real