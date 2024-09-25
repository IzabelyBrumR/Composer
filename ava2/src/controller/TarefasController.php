<?php

namespace Controller;

use Model\TarefasModel;

require './vendor/autoload.php';

class TarefasController
{

    //Método construtor.
    public function __construct() {}

    public function loadByIdTarefas($id)
    {
        $tarefa = new TarefasModel;
        $tarefa = $tarefa->loadByIdTarefas($id); //loadbyId está na model agora e retorna um objeto do tipo usuário
        return $tarefa;
    }

    public function loadAllTarefas()
    {
        $tarefa = new TarefasModel;
        $result = $tarefa->loadAllTarefas(); //$result é uma array que retorna do banco de dados.
        return $result;
    }

    public function delete($id)
    {
        $tarefa = new TarefasModel;
        $tarefa->delete($id);
        if($tarefa->total > 0){
            header('location: \listarTarefas.php?cod=success');
        }else{
            header('location: \listarTarefas.php?cod=error');
        }
    }

    public function saveTarefas()
    {
        if ($_POST) {
            $tarefa = new TarefasModel;
            $tarefa->setId($_POST['id']);
            $tarefa->setNome($_POST['nome']);
            $tarefa->setDescricao($_POST['descricao']);
            $tarefa->setPrazo($_POST['prazo']);
            $tarefa->setProjetoId($_POST['projeto_id']);
            $tarefa->setStatusId($_POST['status_id']);
            $tarefa->saveTarefas();
            if($tarefa->total> 0){
                //success
                //Não precisa mais colocar ../ somente colocar \ que redireciona para a raiz.
                header('location: \listarTarefas.php?cod=success');
            }else{
                //error
                header('location: \manterTarefa.php?cod=error');
            }
        }
    }
}
