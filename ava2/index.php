<?php 
use Controller\UsuarioController;

require_once"./vendor/autoload.php";

$user = new UsuarioController;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gerenciador de Projetos</title>
    <link href="\src/css/bootstrap.min.css" rel="stylesheet">
    <script src="\src/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 400px;">
            <img width="80%" class="text-center" src="\src/img/logo.png">
            <h2 class="text-center mb-4">Login</h2>
            <!-- TODO: Implementar funcionalidade de logar no sistema sem Cookies - 1 PONTO (Não apagar TODO.) -->
            <form method="POST" action="<?php $user->login();?>">
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                <!-- TODO: Implementar cadastro de usuário - 1 PONTO. Usuários criados aqui são do tipo_usuario="Usuário" (Não apagar TODO.) -->
                <p class="text-center mt-3">Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>
