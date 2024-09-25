<?php
use Controller\TarefasController;
require_once 'vendor/autoload.php';
require_once './shared/header.php';
$tarefa = new TarefasController();
$tarefas = $tarefa -> loadAllTarefas();
?>
        <br>
        
        <div class="mb-4 container">
        <h1 class="mb-4">Tarefas</h1>
            
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <!-- TODO: Implemente a funcionalidade de filtrar tarefas por projeto selecionado - PONTO EXTRA (Não apagar TODO.) -->
                            <label for="filtroProjeto" class="form-label">Filtrar por Projeto</label>
                            <select class="form-select" id="filtroProjeto">
                                <option selected>Escolha um projeto...</option>
                                <option value="1">Projeto 1</option>
                                <option value="2">Projeto 2</option>
                            </select>
                        </div>
                    </div>
                </div>
               
                <input type="submit" class="btn btn-primary" value="Aplicar filtro">
            </form>
        </div>

        <!-- Tabela de Tarefas -->
        <div class="d-flex justify-content-between mb-4 container">
                <h4>Lista de Tarefas</h4>
                <!-- TODO: Implementar a funcionalidade de cadastrar nova tarefa - PONTO EXTRA (Não apagar TODO.) -->
                <a href="manterTarefa.php" class="btn btn-primary">Nova Tarefa</a>
            </div>
        <div class="table-responsive container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome da Tarefa</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Prazo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($tarefas as $tar){
                    echo'<tr>
                        <td>'.$tar['nome'].'</td>
                        <td>'.$tar['descricao'].'</td>
                        <td>'.$tar['status_id'].'</td>
                        <td>'.$tar['prazo'].'</td>
                        <td>
                             <!-- TODO: Implente o CRUD das tarefas - PONTO EXTRA (Não apagar TODO.) -->
                            <a href="./manterTarefa.php?id='.$tar['id'].'&&cod=editar"<button class="btn btn-sm btn-warning">Editar</button></a>
                            <a href="./manterTarefa.php?id='.$tar['id'].'&&cod=excluir"<button class="btn btn-sm btn-danger">Excluir</button></a>
                            <button class="btn btn-sm btn-success">Concluir</button>
                        </td>
                    </tr>';
                    }
                ?>
                     <!-- TODO: Adicione as tarefas dinamicamente - 1 PONTO (Não apagar TODO.) -->
                </tbody>
            </table>
        </div>
    </div>
<?php
require_once './shared/footer.php';
?>