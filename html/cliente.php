<?php
if (filter_has_var(INPUT_GET, 'id')) {
    require_once 'Connection.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE id = {$id};";
    $query = $pdo->prepare($sql);
    $query->execute();
    $cliente = (array)$query->fetch();
    $Action = 'update';
} else {
    $Action = 'insert';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro e edição</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-warning" href="listacliente.php">Voltar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form id="dados_cliente">
                    <input type="hidden" value="<?php echo $Action; ?>" name="action" id="action">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <div class="row mt-4">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nome"
                                    name="nome"
                                    placeholder="name@example.com" value="<?php echo $cliente['nome']; ?>" autofocus>
                                <label for="nome">Digite seu nome</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cpf"
                                    name="cpf"
                                    placeholder="name@example.com"
                                    value="<?php echo $cliente['cpf']; ?>">
                                <label for="cpf">Digite seu cpf</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="rg"
                                    name="rg"
                                    placeholder="name@example.com" value="<?php echo $cliente['rg']; ?>">
                                <label for="rg">Digite seu rg</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <button class="btn btn-success" id="salvar" type="button">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="cliente.js"></script>
</body>

</html>