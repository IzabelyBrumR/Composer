<?php

namespace Controller;

use Model\ProjetosModel;

require './vendor/autoload.php';

class ProjetosController
{

    //Método construtor.
    public function __construct() {}

    public function loadByIdProjects($id)
    {
        $projeto = new ProjetosModel;
        $projeto = $projeto->loadByIdProjects($id); //loadbyId está na model agora e retorna um objeto do tipo usuário
        return $projeto;
    }

    public function loadAllProjects()
    {
        $projeto = new ProjetosModel;
        $result = $projeto->loadAllProjects(); //$result é uma array que retorna do banco de dados.
        return $result;
    }

    public function delete($id)
    {
        $projeto = new ProjetosModel;
        $projeto->delete($id);
        if($projeto->total > 0){
            header('location: \listarProjetos.php?cod=success');
        }else{
            header('location: \listarProjetos.php?cod=error');
        }
    }

    public function saveProjects()
    {
        if ($_POST) {
            @session_start();
            $projeto = new ProjetosModel;
            $projeto->setId($_POST['id']);
            $projeto->setNome($_POST['nome']);
            $projeto->setDescricao($_POST['descricao']);
            $projeto->setDataInicio($_POST['data_inicio']);
            $projeto->setDataFim($_POST['data_fim']);
            $projeto->setStatusId($_POST['status_id']);
            $projeto->setUsuarioId($_SESSION['id']);
            $projeto->saveProjects();
            if($projeto->total> 0){
                //success
                //Não precisa mais colocar ../ somente colocar \ que redireciona para a raiz.
                header('location: \listarProjetos.php?cod=success');
            }else{
                //error
                header('location: \manterProjeto.php?cod=error');
            }
        }
    }
    }

