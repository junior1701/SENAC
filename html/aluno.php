<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="form">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
        <br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required>
        <br>
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" placeholder="Digite seu RG">
        <br>
        <label for="rg">Data de nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento" placeholder="Digite sua data de nascimento">
        <button type="button" id="btnsalvar">Salvar</button>
    </form>
    <script src="/js/aluno.js"></script>
</body>

</html>