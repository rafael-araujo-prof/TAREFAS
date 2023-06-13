<?php
session_start();
require "banco.php";
require "ajudantes.php";
$exibir_tabela = true;

if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
    $tarefa = [];
    $tarefa['nome'] = $_GET['nome'];
if (array_key_exists('descricao', $_GET)) {
    $tarefa['descricao'] = $_GET['descricao'];
} else 
    {
    $tarefa['descricao'] = '';
    }
if (array_key_exists('prazo', $_GET)) {
    $tarefa['prazo'] =traduz_data_para_banco($_GET['prazo']);
} else {
    $tarefa['prazo']='';
}
    $tarefa['prioridade'] = $_GET['prioridade'];
if (array_key_exists('concluida', $_GET)) {
    $tarefa['concluida'] = $_GET['concluida'];
} else {
    $tarefa['concluida'] = '';
}
    gravar_tarefa($conexao,$tarefa);
    header('Location: tarefas.php');
    die();
}
    
    $lista_tarefas = buscar_tarefas($conexao);

	include "./teste.php"; //opcional para incluir uma imagem no topo
    $tarefa = [
        'id' => 0,
        'nome' => '',
        'descricao' => '',
        'prazo' => '',
        'prioridade' => 1,
        'concluida' => ''
        ];
    include "./template.php";
?>