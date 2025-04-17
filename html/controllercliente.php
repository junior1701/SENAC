<?php
require_once 'Connection.php';
$action = $_POST['action'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];

if ($_SERVER["REQUEST_METHOD"] === 'POST' and $action === 'insert') {
    $sql = "INSERT INTO cliente(nome, cpf, rg) VALUES (:nome, :cpf, :rg);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':nome', $nome);
    $query->bindParam(':cpf', $cpf);
    $query->bindParam(':rg', $rg);
    $IsSave = (bool)$query->execute();
    if ($IsSave) {
        $response = array('status' => true, 'msg' => 'Salvo com sucesso!');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'msg' => 'Restrição:' . $IsSave);
        echo json_encode($response);
    }
}
if ($_SERVER["REQUEST_METHOD"] === 'POST' and $action === 'update') {
    #Alteramos os dados 
    $sql = "UPDATE cliente SET nome = :nome, cpf = :cpf, rg = :rg WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':nome', $nome);
    $query->bindParam(':cpf', $cpf);
    $query->bindParam(':rg', $rg);
    $query->bindParam(':id', $id);
    if ($query->execute()) {
        echo json_encode(['status' => true, 'msg' => 'Alterado com sucesso!']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Erro ao atualizar']);
    }
}
if ($_SERVER["REQUEST_METHOD"] === 'POST' and $action === 'delete') {
    #Excluir os dados 
    $sql = "DELETE FROM cliente WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id);
    if ($query->execute()) {
        $response = array('status' => true, 'msg' => 'Removido com sucesso!');
        echo json_encode($response);
    } else {
        $response = array('status' => false, 'msg' => 'Restrição:' . $IsDelete);
        echo json_encode($response);
    }
}
