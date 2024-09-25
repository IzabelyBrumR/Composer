<?php 
require_once "vendor/autoload.php";
use Controller\UsuarioController;
$user = new UsuarioController;

if(isset($_REQUEST['action'])){
    if($_REQUEST['action'] == 'register'){
        $user -> save();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Gerenciador de Projetos</title>
    <link href="\src/css/bootstrap.min.css" rel="stylesheet">
    <script src="\src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 400px;">
        <img width="80%" class="text-center" src="\src/img/logo.png">
            <h2 class="text-center mb-4">Cadastro</h2>
            <form action="cadastro.php?action=register" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-senha" class="form-label">Confirmar Senha</label>
                    <input type="password" class="form-control" id="confirm-senha" name="confirm-senha" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                <p class="text-center mt-3">Já tem uma conta? <a href="index.php">Entrar</a></p>
            </form>
        </div>
    </div>
</body>
</html>
