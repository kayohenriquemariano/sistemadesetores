<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Setores</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <h2>Cadastrar / Editar Setor</h2>

    <input type="hidden" id="id">
    <input type="text" id="nome" placeholder="Nome do setor">
    <button onclick="salvar()">Salvar</button>

    <h2>Lista de Setores</h2>
    <ul id="lista"></ul>

</div>

<script src="{{ asset('js/conexao.js') }}"></script>
</body>
</html>
