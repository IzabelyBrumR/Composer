<?php
use Controller\ProjetosController;
require_once 'vendor/autoload.php';
require_once './shared/header.php';
$projeto = new ProjetosController();
$projetos = $projeto -> loadAllProjects();
?>
        <div class="container my-4">
            <h1 class="mb-4">Projetos</h1>
            <div class="d-flex justify-content-between mb-4">
                <h4>Lista de Projetos</h4>
                <!-- TODO: Implementar a funcionalidade de cadastrar novo projeto - 1 PONTO (Não apagar TODO.) -->
                <a href="manterProjeto.php" class="btn btn-primary">Novo Projeto</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome do Projeto</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($projetos as $projects){
                        echo'<tr>
                            <td>'.$projects['nome'].'</td>
                            <td>'.$projects['descricao'].'</td>
                            <td>
                                <!-- TODO: Implementar a funcionalidade de editar projeto - 1 PONTO. (Não apagar TODO.) -->
                                <a href="./manterProjeto.php?id='.$projects['id'].'&&cod=editar"><button class="btn btn-sm btn-warning">Editar</button></a>
                                <!-- TODO: Implementar a funcionalidade de excluir projeto - 1 PONTO (Não apagar TODO.) -->
                                <a href="./manterProjeto.php?id='.$projects['id'].'&&cod=excluir"><button class="btn btn-sm btn-danger">Excluir</button></a>
                            </td>
                        </tr>';
                        }
                        ?>
                        <!-- TODO: Fazer dinâmico para carregar outros projetos  - 1 PONTO (Não apagar TODO.) -->
                    </tbody>
                </table>
            </div>
        </div>
<?php
require_once './shared/footer.php';
?>