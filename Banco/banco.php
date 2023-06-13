<?php
    $bdServidor = 'localhost';
    $bdUsuario = 'sistematarefa';
    $bdSenha = 'sistema';
    $bdBanco = 'tarefas';
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
if (mysqli_connect_errno()) 
    {
    echo "Problemas para conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
    }

function buscar_tarefas($conexao)
{
    $sqlBusca = "SELECT * FROM tarefas";
    $resultado = mysqli_query($conexao, $sqlBusca);
      $tarefas = [];
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[] = $tarefa;
    }
    return $tarefas;
}
/**
 * Summary of gravar_tarefa
 * @param mixed $conexao
 * @param mixed $tarefa
 * @return void
 */

    function gravar_tarefa($conexao, $tarefa)
    {
        if ($tarefa['prazo'] == '') {
            $prazo = 'NULL';
            } else {
            $prazo = "'{$tarefa['prazo']}'";
            }
    $sqlGravar = "
    INSERT INTO tarefas
    (nome, descricao, prioridade,prazo,concluida)
    VALUES
    (
    '{$tarefa['nome']}',
    '{$tarefa['descricao']}',
     {$tarefa['prioridade']},
     {$prazo},
    '{$tarefa['concluida']}'
    )";
    mysqli_query($conexao, $sqlGravar);
    echo "Gravação ok!";
}
function buscar_tarefa($conexao, $id) {
    $sqlBusca = 'SELECT * FROM tarefas WHERE id = '.$id;
    $resultado = mysqli_query($conexao, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
    }
function editar_tarefa($conexao, $tarefa)
    {
    if ($tarefa['prazo'] == '') {
    $prazo = 'NULL';
} else {
    $prazo = "'{$tarefa['prazo']}'";
    }
    $sqlEditar = "
        UPDATE tarefas SET
        nome = '{$tarefa['nome']}',
        descricao = '{$tarefa['descricao']}',
        prioridade = {$tarefa['prioridade']},
        prazo = {$prazo},
        concluida = {$tarefa['concluida']}
        WHERE id = {$tarefa['id']}
    ";
    mysqli_query($conexao, $sqlEditar);
    }
    function remover_tarefa($conexao, $id)
    {
        $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
        mysqli_query($conexao, $sqlRemover);
    }
?>