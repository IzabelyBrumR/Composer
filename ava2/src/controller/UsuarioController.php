<?php

namespace Controller;

use Model\UsuarioModel;

require './vendor/autoload.php';

class UsuarioController
{

    //Método construtor.
    public function __construct() {}

    public function login()
    {
        if ($_POST) {
            //pega o email
            $email = $_POST['email'];
            //pega a senha
            $senha = $_POST['password'];

            $usuario = new UsuarioModel;

            $usuario = $usuario->login($email, $senha); //capturo informações do usuario que vem da consulta
            //se retornar 1 existe usuario com o email e senha informados
            if ($usuario->total > 0) {
                @session_start();
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nome'] = $usuario->getNome();

                header('location:./listarProjetos.php?cod=success');
            } else {
                //se não retornar nada não existe e deve retornar a página index com mensagem de erro.
                header('location:./index.php?cod=error');
            }
        }
    }

    public function loadById($id)
    {
        $usuario = new UsuarioModel;
        $usuario = $usuario->loadById($id); //loadbyId está na model agora e retorna um objeto do tipo usuário
        return $usuario;
    }

    public function loadAll()
    {
        $usuario = new UsuarioModel;
        $result = $usuario->loadAll(); //$result é uma array que retorna do banco de dados.
        return $result;
    }

    public function delete($id)
    {
        $usuario = new UsuarioModel;
        $usuario->delete($id);
        if($usuario->total > 0){
            header('location: \listarUsuarios.php?cod=success');
        }else{
            header('location: \listarUsuarios.php?cod=error');
        }
    }

    public function save()
    {
        if ($_POST) {
            $usuario = new UsuarioModel;
            $usuario->setId($_POST['id']);
            $usuario->setNome($_POST['nome']);
            $usuario->setEmail($_POST['email']);
            $usuario->setSenha($_POST['senha']);
            $usuario->save();
            if($usuario->total> 0){
                //success
                //Não precisa mais colocar ../ somente colocar \ que redireciona para a raiz.
                header('location: \index.php?cod=success');
            }else{
                //error
                header('location: \cadastro.php?cod=error');
            }
        }
    }
}
